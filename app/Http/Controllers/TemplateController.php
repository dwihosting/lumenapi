<?php

namespace App\Http\Controllers;

use App\Template;
use App\Checklists;
use App\Items;

use App\Http\Controllers;
use Illuminate\Http\Request;


class TemplateController extends Controller
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

  
    public function postTemplate(Request $request)
    {
        $post = Template::create([
            'name'      => $request->attribute['name']
        ]);

        $checklist = Checklists::create([
            'template_id'   => $post->id,
            'description'   => $request->attribute['checklist']['description'],
            'due_interval'  => $request->attribute['checklist']['due_interval'],
            'due_unit'      => $request->attribute['checklist']['due_unit']
        ]);
        $checklist_array = [
            'description'   => $checklist->description,
            'due_interval'  => $checklist->due_interval,
            'due_unit'      => $checklist->due_unit            
        ];

        $items = Items::create([
            'template_id'   => $post->id,
            'description'   => $request->attribute['items']['description'],
            'urgency'      => $request->attribute['items']['urgency'],            
            'due_interval'  => $request->attribute['items']['due_interval'],
            'due_unit'      => $request->attribute['items']['due_unit']
        ]);

        $items_array = [
            'description'   => $items->description,
            'urgency'       => $items->urgency,
            'due_interval'  => $items->due_interval,
            'due_unit'      => $items->due_unit            
        ];
              
        return response()->json([
            'data' => [
                'id'            => $post->id,
                'attribute'     => [
                    'name'      => $post->name,
                    'checklist' => $checklist_array,
                    'items'     => $items_array
                ] 
            ],

        ]);
        
    }

    public function patchTemplate($id, Request $request)
    {
        $template = Template::find($id);
        $name = $request->attribute['name'];
        $template->update([
            'name'  => $name        
        ]);

        $checklist  = Checklists::select('due_unit', 'description', 'due_interval')->where('template_id', $template->id)->first();
        $checklist->update([
            'description'   => $request->attribute['checklist']['description'],
            'due_interval'  => $request->attribute['checklist']['due_interval'],
            'due_unit'      => $request->attribute['checklist']['due_unit']
        ]);
        $checklist  = Checklists::select('due_unit', 'description', 'due_interval')->where('template_id', $template->id)->first();
        

        $items  = Items::where('template_id', $template->id)->get();
        $i = 0;
        foreach($items as $item){
            $item_array = Items::find($item->id);
            $item_array->update([
                'description'   => $request->attribute[$i]['items']['description'],
                'urgency'       => $request->attribute[$i]['items']['urgency'],            
                'due_interval'  => $request->attribute[$i]['items']['due_interval'],
                'due_unit'      => $request->attribute[$i]['items']['due_unit']
            ]);
            $i++;
        }
        $items  = Items::select('description', 'urgency', 'due_interval', 'due_unit')->where('template_id', $template->id)->get();
                      
        return response()->json([
            'data' => [
                'id'            => $template->id,
                'attribute'     => [
                    'name'      => $template->name,
                    'checklist' => $checklist,
                    'items'     => $items
                ] 
            ],

        ]);        
    }

    public function getDetailTemplate($id)
    {
        $template = Template::find($id);
        $items  = Items::select('urgency','due_unit', 'description', 'due_interval')->where('template_id', $template->id)->get();
        
        $checklist  = Checklists::select('due_unit', 'description', 'due_interval')->where('template_id', $template->id)->first();
        
        return response()->json([
            'data' => [
                'type'          => 'templates',
                'id'            => $template->id,
                'attribute'     => [
                    'name'      => $template->name,
                    'items'     => $items,
                    'checklist' => $checklist
                ],
                'links'      => [
                    'self'  => ''
                ] 
            ],
        ]);
    }
    
    public function deleteTemplate($id)
    {
        $checklist      = Checklists::where('template_id',$id)->delete();  
        $items          = Items::where('template_id',$id)->delete();  
        $template       = Template::where('id',$id)->delete();

        return response()->json([

        ], 204);
    }
 
    public function getAllTemplate()
    {
        Template::orderBy('id')->chunk(10, function ($templates) {
            foreach ($templates as $template) {
                //
            }
        });;

        return response()->json([
            'data'  => ''
        ]);
    }

    public function postAssignsTemplate($id, Request $request)
    {
        return response()->json([
            'data'  => ''
        ]);
    }
}
