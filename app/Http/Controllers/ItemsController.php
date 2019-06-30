<?php

namespace App\Http\Controllers;

use App\Checklists;
use App\Items;


class ItemsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //

    public function postCompleteItem(Request $request)
    {
        $data_array = array();
        return response()->json([
            'data'  => $data_array
        ]);
    }

    public function postInCompleteItem(Request $request)
    {
        $data_array = array();
        return response()->json([
            'data'  => $data_array
        ]);
    }

    function getListItem($checklistId, Request $request)
    {
        $checklist = Checklists::find($checklistId);
        $items = Items::where('chechklist_id', $checklistId)->get();

        foreach($items as $item){
            $data_item[] = [
                'id'                => $item->id,
                'name'              => $item->name,
                'user_id'           => $item->user_id,
                'is_completed'      => $item->is_completed,
                'due'               => $item->due,
                'urgency'           => $item->urgency,
                'checklist_id'      => $checklist_id,
                'assignee_id'       => $item->assignee_id,
                'task_id'           => $item->task_id,
                'completed_at'      => $item->completed_at,
                'last_update_by'    => $item->last_update_by,
                'update_at'         => $item->update_at,
                'created_at'        => $item->created_at
            ];
        }

        $data_array = array();
        return response()->json([
            'data'  => [
                'type'  => 'checklists',
                'id'    => $items->id,
                'attributes'    => [
                    'object_domain' => $checklist->object_domain,
                    'object_id'     => $checklist->object_id,
                    'description'   => $checklist->description,
                    'is_completed'  => $checklist->is_completed,
                    'due'           => $checklist->due,
                    'urgency'       => $checklist->urgency,
                    'completed_at'  => $checklist->completed_at,
                    'last_update_by' => $checklist->last_updated_by,
                    'update_at'     => $checklist->update_at,
                    'created_at'    => $checklist->created_at,
                    'items' => $data_item
                ],
                'links'     => [
                    'self'  => ''
                ]
            ]
        ]);
    }

    function postItem($checklistId, Request $request)
    {
        $desc       = $request->data['attribute']['description'];
        $due        = $request->data['attribute']['due'];
        $urgency    = $request->data['attribute']['urgency'];
        $assignee_id = $request->data['attribute']['assignee_id'];
        
        $items = Items::create([
            'checklist_id'  => $checklistId,
            'description'   => $desc,
            'due'           => $due,
            'urgency'       => $urgency,
            'asignee_id'    => $assignee_id
        ]);

        $id = $items->id;

        $items = Items::where('checklist_id', $checklistId)->where('id', $id)->first();
        $data_array = array(
            'type'  => 'checklists',
            'id'    => $items->id,
            'attributes'    => [
                'description'       => $items->description,
                'is_completed'      => $items->is_completed,
                'due'               => $items->due,
                'urgency'           => $items->urgency,
                'assignee_id'       => $items->assignee_id,
                'completed_at'      => $items->completed_at,
                'updated_by'        => $items->update_by,
                'updated_at'        => $items->update_at,
                'created_at'        => $items->created_at
            ],
            'links'     => [
                'selft'     => ''
            ]    
        );
        return response()->json([
            'data'  => $data_array
        ]);
    }

    public function getDetailItem($checklistId, $itemId)
    {
        $items = Items::where('checklist_id', $checklistId)->where('id', $itemId)->first();
        
        $attribute = array(
            'description'       => $items->description,
            'is_completed'      => $items->is_completed,
            'completed_at'      => $items->completed_at,
            'due'               => $items->due,
            'urgency'           => $items->urgency,
            'updated_by'        => $items->update_by,
            'created_by'        => $items->created_by,
            'checklist_id'      => $items->checklist_id,
            'assignee_id'       => $items->assignee_id,
            'task_id'           => $items->assignee_id,
            'deleted_at'        => $items->deleted_at,
            'created_at'        => $items->created_at,
            'updated_at'        => $items->update_at               
        );

        return response()->json([
            'data'  => array(
                'type'      => 'checklists',
                'id'        => $items->id,
                'attribut'  => $attribute    
            ),
            'links' => array(
                'self' => ''
            )
        ]);
    }

    public function patchItem($checklistId, $itemId, Request $request)
    {
        $items = Items::find($itemid);
        $desc       = $request->data['attribute']['description'];
        $due        = $request->data['attribute']['due'];
        $urgency    = $request->data['attribute']['urgency'];
        $assignee_id = $request->data['attribute']['assignee_id'];
        
        $items->update([
            'description'  => $desc,
            'due'  => $due,
            'urgency'  => $urgency,
            'asignee_id'  => $assignee_id
        ]);

        
        $items = Items::where('checklist_id', $checklistId)->where('id', $itemid)->first();
        $data_array = array(
            'type'  => 'checklists',
            'id'    => $items->id,
            'attributes'    => [
                'description'       => $items->description,
                'is_completed'      => $items->is_completed,
                'due'               => $items->due,
                'urgency'           => $items->urgency,
                'assignee_id'       => $items->assignee_id,
                'completed_at'      => $items->completed_at,
                'updated_by'        => $items->update_by,
                'updated_at'        => $items->update_at,
                'created_at'        => $items->created_at
            ],
            'links'     => [
                'self'     => ''
            ]    
        );
        return response()->json([
            'data'  => $data_array
        ]);
    }

    public function deleteItem($checklistId, $itemId)
    {
        $items          = Items::where('id',$item_id)->where('checklist_id',$id)->delete();  
                
        $data_array = array();
        return response()->json([

        ], 204);
    }

    public function postBulkItem($checklistId, Request $request)
    {
        $items = $request->data;
        $data_array = array();
        
        foreach($items as $item){
            $data_item = Items::find($item->id);
            $data_item->update([
                'description'   => $item->attributes['description'],
                'due'           => $item->attributes['due'],
                'urgency'       => $item->attributes['urgency']
            ]); 

            $data_array[] = [
                'id'        => $item->id,
                'action'    => $items->action, 
                'status'    => 200
            ]; 
        }

        return response()->json([
            'data'  => $data_array
        ]);
    }


    // NOT FINISH YET
    public function getAllItem(Request $request)
    {
        $items = Items::where('object_domain', $request->object_domain)->first();

        $data_array = [
            'today'         => 0,
            'past_due'      => 0,
            'this_week'     => 0,
            'past_week'     => 0,
            'this_month'    => 0,
            'total'         => 0,
        ];
        return response()->json([
            'data'  => $data_array
        ]);
    }


    
    //

}
