<?php

namespace App\Http\Controllers;

use App\Checklists;
use App\Items;
use App\Attribute;


class ChecklistsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('auth');
    }

    //

    public function getDetailChecklist($checklistId)
    {
        $checklist = Checklists::find($checklistId)->first();

        if ($checklist){
            $attribute = Attribute::where('checklist_id', $checklistId)->first();

            $attribute = array(
                "object_domain"     => @$attribute->object_domain,
                "object_id"         => @$attribute->id,
                "description"       => @$attribute->description,
                "is_completed"      => @$attribute->is_complete,
                "due"               => @$attribute->due,
                "urgency"           => @$attribute->urgency,
                "completed_at"      => @$attribute->completed_at,
                "last_update_by"    => @$attribute->list_update_by,
                "update_at"         => @$attribute->update_at,
                "created_at"        => @$attribute->created_at   
            );

            return response()->json([
                'data'  => [
                    'type'      => 'checklist',
                    'id'        => $checklist->id,
                    'attribut'  => $attribute    
                ],
                'links' => [
                    'self' => ''
                ]
                ], 200);

        } else {
            return response()->json([
                'status'    => '404',
                'error'     => 'Not Found'
                ],404);
        }
    }
    
    public function patchCheckList($checklistId, Request $request)
    {
        $checklist = Checklists::find($checklistId)->first();

        if ($checklist){
        
            $attribute = Attribute::where('checklist_id', $checklistId)->first();
            $attribute->update([
                "object_domain"     => $request->object_domain,
                "object_id"         => $request->id,
                "description"       => $request->description,
                "is_completed"      => $request->is_complete,
                "due"               => $request->due,
                "urgency"           => $request->urgency,
                "completed_at"      => $request->completed_at,
                "last_update_by"    => $request->list_update_by,
                "update_at"         => $request->update_at,
                "created_at"        => $request->created_at   
            ]);
            $attribute = Attribute::where('checklist_id', $checklistId)->first();
            
            return response()->json([
                'data'  => [
                    'type'      => 'checklist',
                    'id'        => $checklist->id,
                    'attribut'  => $attribute    
                ],
                'links' => [
                    'self' => ''
                ]
                ], 200);
            } else {
                return response()->json([
                    'status'    => '404',
                    'error'     => 'Not Found'
                    ],404);
                }        
    }
    

    //

}
