<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ItemTypeController extends Controller
{

    public function index()
    {
        $page_title = __('lang.dialogitemtypename');
        $page_description = 'This is datatables test page';
        $windowId = Str::random(36);

        return view('reference.itemtype.index', compact('page_title', 'page_description', 'windowId'));
    }    

    public function loadData(Request $request)
    {
        $criteria = [];
        $columns = $request->input('columns');
        foreach ($columns as $row) {
            if ($row['search']['value']) {
                $criteria[$row['data']] = array(
                    array(
                        'dataType' => '', 
                        'operator' => 'like', 
                        'value' => '%'.$row['search']['value'].'%'
                    )
                );
            }
        }

        $params = [
            'criteria' => $criteria,
            'paging' => [
                'offset' => $request->input('start'),
                'pageSize' => $request->input('length')
            ],
            'ordering' => [
                'column' => $columns[$request->input('order.0.column')]['data'],
                'orderType' => $request->input('order.0.dir')
            ]
        ];

        $data = postRestToken('itemtype', $params);
        
        if ($data['status'] === 'error') {
            return response()->json($data);
        }
        return response()->json(array(
            'status' => 'success', 
            'recordsTotal' => $data['result']['recordsTotal'], 
            'recordsFiltered' => $data['result']['recordsFiltered'], 
            'data' => $data['result']['data']
        ));
    }

    public function createForm() 
    {
        return view('reference.itemtype.create');
    }

    public function save(Request $request)
    {
        $params = [
            'itemTypeName' => $request->input('itemTypeName')
        ];

        $data = postRestToken('itemtype/save', $params);
        
        return response()->json($data);
    }

    public function editForm(Request $request) 
    {
        $itemTypeId = $request->input('item_type_id');
        $itemTypeName = $request->input('item_type_name');

        return view('reference.itemtype.edit', compact('itemTypeId', 'itemTypeName'));
    }

    public function update(Request $request)
    {
        $params = [
            'itemTypeId' => $request->input('itemTypeId'),
            'itemTypeName' => $request->input('itemTypeName')
        ];

        $data = postRestToken('itemtype/update', $params);
        
        return response()->json($data);
    }    

    public function delete(Request $request)
    {
        $params = [
            'itemTypeId' => $request->input('item_type_id')
        ];

        $data = postRestToken('itemtype/delete', $params);
        
        return response()->json($data);
    }        
}
