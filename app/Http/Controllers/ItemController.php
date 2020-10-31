<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use DateTime;
use Date;
use File;
use Storage;
use Image;

class ItemController extends Controller
{

    public function index()
    {
        $page_title = __('lang.itemlist');
        $windowId = Str::random(36);

        return view('pages.item.index', compact('page_title', 'windowId'));
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

        $data = postRestToken('item', $params);
        
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
        // $params = [
        //     'ordering' => [
        //         'column' => 'item_type_name',
        //         'orderType' => 'asc'
        //     ]
        // ];        
        // $itemTypeData = postRestToken('itemtype', $params);
        // $itemTypeData = $itemTypeData['result']['data'];
        $windowId = Str::random(36);
        $itemTypeData = [];

        return view('pages.item.create', compact('itemTypeData', 'windowId'));
    }

    public function save(Request $request)
    {
        $params = [
            'itemName' => $request->input('itemName'),
            'itemType' => $request->input('itemType'),
            'itemPrice' => $request->input('itemPrice'),
            'itemDescription' => $request->input('itemDescription'),
            'createdDate' => Date::currentDate(),
            'itemPhoto' => $request->input('event_photo_orig_data'),
            'itemThumbPhoto' => $request->input('event_photo_thumb_data'),
            'itemPhotoExtension' => $request->input('event_photo_extension'),
        ];

        $data = postRestToken('item/save', $params);
        
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

    public function convertPhoto(Request $request)
    {
        $result = [];
        if ($request->hasFile('files')) {
            $files = $request->file('files');
            $storagePath = public_path().'/storage/photo_temp/';

            foreach($files as $key => $file) {
                $ext = strtolower($file->extension());
                $mimeType = $file->getMimeType();
                $filename = Date::currentDate('Y-m-d_H_i_s') . '_' . getUIDAdd($key) . '.' . $ext;
                $file->move($storagePath.'original/', $filename);
                $origImageData = base64_encode(file_get_contents($storagePath.'original/'.$filename));
                /* Generate thumb image */
                $image_resize = Image::make($storagePath.'original/'.$filename);    
                $image_resize->resize(600, null, function ($constraint) {
                    $constraint->aspectRatio();
                });                
                $image_resize->save($storagePath.'thumb/'.$filename);            
                $thumbImageData = base64_encode(file_get_contents($storagePath.'thumb/'.$filename)); 
                
                $result[] = array(
                    'extension'       => $ext, 
                    'mimeType'        => $mimeType,
                    'origBase64Data'  => $origImageData,
                    'thumbBase64Data' => $thumbImageData
                );
                
                @unlink($storagePath.'original/'.$filename);                
                @unlink($storagePath.'thumb/'.$filename);                
            }
        }

        return response()->json(array('status' => 'success', 'imageData' => $result));
    }         
}
