<?php

namespace App\Classes;

use App\Models\ActivityLog as ActivityLogModel;

class ActivityLog
{
    private $data = [];

    public function createActionLog($editor_id, $action, $changed_by, $old_changes, $new_changes)
    {
        $this->data = [
            'action'     => $action,
            'changed_by' => $changed_by,
        ];

        if ($old_changes && $new_changes) {
            $this->compareChanges($old_changes, $new_changes);
        }

        $this->addEditorIdToData($changed_by, $editor_id);

        try {
            ActivityLogModel::create($this->data);
        } catch (Exception $e) {
            // nothing
        }
    }

    public function addEditorIdToData($changed_by, $editor_id)
    {
        if ($changed_by == 'admin') {
            return $this->data['user_id'] = $editor_id;
        } elseif ($changed_by == 'customer') {
            return $this->data['customer_id'] = $editor_id;
        }
    }

    public function compareChanges($old_changes, $new_changes)
    {
        $changes = array_diff($old_changes, $new_changes);

        if ($changes['_token']) {
            unset($changes['_token']);
        }

        $connectedChanges = [];
        foreach ($changes as $index => $change) {
            if ($change == $old_changes[$index]) {
                $connectedChanges[] = [
                    'name' => $index,
                    'old'  => $new_changes[$index],
                    'new'  => $change,
                ];
            }
        }

        return $this->data['changes'] = json_encode($connectedChanges);
    }
}
