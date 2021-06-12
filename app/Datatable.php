<?php

namespace App;

class Datatable
{

    protected $model;
    protected $columns;
    protected $searchable;
    protected $conditions;
    protected $searchValue;

    public function __construct($model, $columns, $searchable, $conditions = null)
    {
        $this->model = $model;
        $this->columns = $columns;
        $this->searchable = $searchable;
        $this->conditions = $conditions;
    }

    public function draw()
    {
        ## Read value
        $self = $this;
        $draw = request()->get('draw');
        $start = request()->get("start");
        $rowperpage = request()->get("length"); // Rows display per page

        $columnIndex_arr = request()->get('order');
        $columnName_arr = request()->get('columns');
        $order_arr = request()->get('order');
        $search_arr = request()->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value
        $this->searchValue = $searchValue;

        // return json_encode(request()->all());

        
        if($this->conditions) {
            // Total records
            $totalRecords = $this->model->where($this->conditions)->count();

            $query = $this->model->where($this->conditions)->where(function($query) use($self) {
                foreach($self->searchable as $key => $search) {
                    if($key == 0) {
                        $query->where("{$search}", 'like', "%{$self->searchValue}%");
                    } else {
                        $query->orWhere("{$search}", 'like', "%{$self->searchValue}%");
                    }
                }
            });

            $totalRecordswithFilter = $query->count();

            // Fetch records
            $records = $query
                ->orderBy($columnName, $columnSortOrder)
                ->select('*')
                ->skip($start)
                ->take($rowperpage)
                ->get();
        } else {
            // Total records
            $totalRecords = $this->model->where($this->conditions)->count();
            
            $query = $this->model->where(function($query) use($self) {
                foreach($self->searchable as $key => $search) {
                    if($key == 0) {
                        $query->where("{$search}", 'like', "%{$self->searchValue}%");
                    } else {
                        $query->orWhere("{$search}", 'like', "%{$self->searchValue}%");
                    }
                }
            });

            $totalRecordswithFilter = $query->count();
            
            // Fetch records
            $records = $query
                ->orderBy($columnName, $columnSortOrder)
                ->select('*')
                ->skip($start)
                ->take($rowperpage)
                ->get();
        }


        $data_arr = array();

        if($records) {
            foreach ($records as $key => $record) {
                // $data_arr[] = collect($this->columns)->map(function($column) use($record) {
                //     return [
                //         $column => $record[$column]
                //     ];
                // });
                $obj = $this->model->find($record['id']);
                $dat = [];
                foreach ($this->columns as $column) {
                    if($column == 'photo') {
                        $dat[$column] = "<img src='{$obj->photo()}' width='40'>";
                    } elseif($column == 'time_preference') {
                        $dat[$column] = $obj->getTimePreference();
                    } elseif($column == 'created_at') {
                        $dat[$column] = $obj->created_at->format('d F, Y g:i A');
                    } else {
                        $dat[$column] = $record[$column];
                    }
                }

                $data_arr[] = $dat;
            }

        }


        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        return json_encode($response);
    }
}
