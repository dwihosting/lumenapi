<?php

namespace App\Http\Controllers;

class ChecklistsController extends Controller
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

    public function getDetailChecklist($id=0)
    {
        $attribute = array(
            "object_domain"     => "contact",
            "object_id"         => $id,
            "description"       =>  "Need to verify this guy house.",
            "is_completed"      => false,
            "due"               => null,
            "urgency"           => 0,
            "completed_at"      => null,
            "last_update_by"    => null,
            "update_at"         => null,
            "created_at"        => "2018-01-25T07:50:14+00:00"   
        );

        $data_array = array(
            'data'  => array(
                'type'      => '',
                'id'        => $id,
                'attribut'  => $attribute    
            ),
            'links' => array(
                'selft' => ''
            )
        );
        $data = json_encode($data_array);
        return $data;
    }

    public function getChecklist()
    {
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

        $data_array = array(
            'data'  => array(
                'type'      => '',
                'id'        => '',
                'attribut'  => $attribute    
            ),
            'links' => array(
                'selft' => ''
            )
        );
        $data = json_encode($data_array);
        return $data;
    }

    public function putCheckList()
    {
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

        $data_array = array(
            'data'  => array(
                'type'      => '',
                'id'        => '',
                'attribut'  => $attribute    
            ),
            'links' => array(
                'selft' => ''
            )
        );
        $data = json_encode($data_array);
        return $data;
    }


    public function postCheckList()
    {
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

        $data_array = array(
            'data'  => array(
                'type'      => '',
                'id'        => '',
                'attribut'  => $attribute    
            ),
            'links' => array(
                'selft' => ''
            )
        );
        $data = json_encode($data_array);
        return $data;
    }

    
    public function deleteCheckList()
    {
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

        $data_array = array(
            'data'  => array(
                'type'      => '',
                'id'        => '',
                'attribut'  => $attribute    
            ),
            'links' => array(
                'selft' => ''
            )
        );
        $data = json_encode($data_array);
        return $data;
    }

    
    public function patchCheckList()
    {
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

        $data_array = array(
            'data'  => array(
                'type'      => '',
                'id'        => '',
                'attribut'  => $attribute    
            ),
            'links' => array(
                'selft' => ''
            )
        );
        $data = json_encode($data_array);
        return $data;
    }
    

    //

}
