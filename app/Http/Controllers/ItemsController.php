<?php

namespace App\Http\Controllers;

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

    public function getDetailItem($checklistId, $itemId)
    {
        $items = Items::where('checklist_id', $checklistId)->where('id', $itemId)->first();
        
        $attribute = array(
            "object_domain"     => "contact",
            "object_id"         => "1",
            "description"       =>  "Need to verify this guy house.",
            "is_completed"      => false,
            "due"               => null,
            "urgency"           => 0,
            "completed_at"      => null,
            "last_update_by"    => null,
            "update_at"         => null,
            "created_at"        => "2018-01-25T07:50:14+00:00"   
        );

        return response()->json([
            'data'  => array(
                'type'      => '',
                'id'        => '',
                'attribut'  => $attribute    
            ),
            'links' => array(
                'self' => ''
            )
        ]);
    }

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

    function getListItem(c$hecklistId, Request $request)
    {
        $data_array = array();
        return response()->json([
            'data'  => $data_array
        ]);
    }

    function postItem($hecklistId, Request $request)
    {
        $data_array = array();
        return response()->json([
            'data'  => $data_array
        ]);
    }

    public function patchItem($checklistId, $itemId)
    {
        $data_array = array();
        return response()->json([
            'data'  => $data_array
        ]);
    }

    public function deleteItem($checklistId, $itemId)
    {
        $data_array = array();
        return response()->json([
            'data'  => $data_array
        ]);
    }

    public function postBulkItem($checklistId, Request $request)
    {
        $data_array = array();
        return response()->json([
            'data'  => $data_array
        ]);
    }

    public function getAllItem()
    {
        $data_array = array();
        return response()->json([
            'data'  => $data_array
        ]);
    }


    
    //

}
