<?php

namespace App\Imports;

use App\Models\FileColumn;
use App\Models\FileData;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class FileImportData implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $column_id_array = [];
        $file_id = session()->pull('file_id');
        foreach ($collection[0]->toArray() as $key => $c1) {
            $fileColumn = new FileColumn();
            $fileColumn->file_id = $file_id;
            $fileColumn->name = $c1;
            $fileColumn->save();
            $column_id_array[$key] = $fileColumn->id;
        }
        unset($collection[0]);
        foreach ($collection->toArray() as $rows) {
            foreach ($rows as $key => $single_row) {
                $fileData = new FileData();
                $fileData->column_id = $column_id_array[$key];
                $fileData->data = $single_row ?: 'null';
                $fileData->save();
            }
        }
    }
}
