<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class CommonController extends Controller
{

    public function employee()
    {
        $gridOptions = [
            'url' => '/selectableGridData',
            'columns' => [
                ['data' => 'item_type_name']
            ],
            'propColumns' => [
                ['title' => __('lang.itemtypename')],
            ],
            'order' => [
                [0, 'asc']
            ],
        ];

        return response()->json(array(
            'title' => __('lang.dialogitemtypename'),
            'close' => __('lang.closebtn'),
            'html' => view('common.selectableGrid', compact('gridOptions'))->render()
        ));        
    }    

    public function selectableGridData(Request $request)
    {
        $criteria = [];
        $columns = $request->input('columns');
        foreach ($columns as $row) {
            if ($row['search']['value']) {
                $criteria[$row['data']] = array(
                    'operator' => 'like', 
                    'operand' => '%'.$row['search']['value'].'%'
                );
            }
        }
        $offset = (int) $request->input('start') + 1;

        $params = ['parameters' => [
            'schema' => "Development",
            'page' => [
                'offset' => (string) $offset,
                'pageSize' => $request->input('length')
            ],
            // 'ordering' => [
            //     'column' => $columns[$request->input('order.0.column')]['data'],
            //     'orderType' => $request->input('order.0.dir')
            // ]
        ]];
        if ($criteria) {
            $params['parameters']['filter'] = $criteria;
        }
        
        $data = postRestToken($request->input('endpoint'), $params);
        
        if ($data['success'] !== 'true') {
            return response()->json($data);
        }
        
        return response()->json(array(
            'status' => 'success', 
            'recordsTotal' => $data['totalCount'], 
            'recordsFiltered' => $data['totalCount'],
            'data' => $data['data']
        ));
    }

    public function route(Request $request)
    {
        $gridOptions = [
            'url' => '/selectableGridData',
            'endpoint' => $request->input('endpoint'),
            'columns' => [
                ['data' => 'code'],
                ['data' => 'name']
            ],
            'propColumns' => [
                ['title' => __('lang.routecode')],
                ['title' => __('lang.routename')],
            ],
            'order' => [
                [0, 'asc']
            ],
        ];

        return response()->json(array(
            'title' => __('lang.dialogitemtypename'),
            'close' => __('lang.closebtn'),
            'html' => view('common.selectableGrid', compact('gridOptions'))->render()
        ));        
    }

    public function salesEmployee(Request $request)
    {
        $gridOptions = [
            'url' => '/selectableGridData',
            'endpoint' => $request->input('endpoint'),
            'columns' => [
                ['data' => 'code'],
                ['data' => 'name'],
                ['data' => 'email']
            ],
            'propColumns' => [
                ['title' => __('lang.employeecode')],
                ['title' => __('lang.employeename')],
                ['title' => __('lang.employeeemail')],
            ],
            'order' => [
                [0, 'asc']
            ],
        ];

        return response()->json(array(
            'title' => __('lang.dialogchooseemployee'),
            'close' => __('lang.closebtn'),
            'html' => view('common.selectableGrid', compact('gridOptions'))->render()
        ));        
    }

    public function item(Request $request)
    {
        $gridOptions = [
            'url' => '/selectableGridData',
            'endpoint' => $request->input('endpoint'),
            'columns' => [
                ['data' => 'itemCode'],
                ['data' => 'itemName'],
                ['data' => 'itemTypeName'],
                ['data' => 'measureCode'],
                ['data' => 'measureName'],
                ['data' => 'barcode'],
            ],
            'propColumns' => [
                ['title' => __('lang.baraaniicode')],
                ['title' => __('lang.baraaniiner')],
                ['title' => __('lang.itemlisttypename')],
                ['title' => __('lang.hemjihcode')],
                /* ['title' => __('lang.hemjihnegj')], */
                ['title' => __('lang.baraaniibarcode')],
            ],
            'order' => [
                [1, 'asc']
            ],
        ];

        return response()->json(array(
            'title' => __('lang.chooseitem'),
            'close' => __('lang.closebtn'),
            'choose' => __('lang.choose'),
            'html' => view('common.multipleSelectableGrid', compact('gridOptions'))->render()
        ));        
    }

    public function autoComplete(Request $request)
    {
        $id = $request->input('id');
        $code = $request->input('code');
        $name = $request->input('name');

        $criteria = [];
        if ($request->input('type') == 'code') {
            $criteria[$code] = array(
                'operator' => 'like', 
                'operand' => '%'.$request->input('q').'%'
            );
        } else {
            $criteria[$name] = array(
                'operator' => 'like', 
                'operand' => '%'.$request->input('q').'%'
            );            
        }

        $params = ['parameters' => [
            'schema' => "Development",
            'page' => [
                'offset' => '1',
                'pageSize' => '30'
            ]
        ]];
        if ($criteria) {
            $params['parameters']['filter'] = $criteria;
        }

        $data = postRestToken($request->input('endPoint'), $params);
        
        if ($data['success'] !== 'true') {
            return response()->json($data);
        }

        $data = $data['data'];
        $result = [];
        if ($data) {
            foreach ($data as $row) {
                array_push($result, $row[$id] . '|' . $row[$code] . '|' . $row[$name]);
            } 
        }
        return response()->json($result);
    }

}
