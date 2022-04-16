<?php

namespace App\Rules;

use App\Models\Date;
use App\Models\Info_value;
use Illuminate\Contracts\Validation\Rule;

use App\Http\Controllers\Api\Info_valueController;

class Daterepeat implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $date = Date::select('*')->where('date', $value)->first();
        
        if (is_null($date)) {
            $date = Date::create([
                'date' => $value,
            ]);
            return true;
        }else{
            //identifica la informacion en info_value
            $category =  Info_value::select('*')->where('date_id', $date->id)->where('category_id', request('category_id'))->first();
            $id = request('id');

            // if (!is_null($id) && !is_null($info_value->category_id) && !is_null($category)) {
            //     return true;
            // }elseif (is_null($id) && is_null($category)) {
            //     return true;
            // }
            if (is_null($id)) {
                if (is_null($category)) {
                    return true;
                }else {
                    return false;
                }
                
            }else {
                $info_value = Info_value::find($id);
                if ($info_value->category_id == request('category_id')) {
                    return true;
                }elseif ($info_value->category_id != request('category_id') && is_null($category)) {
                    return true;
                }
                return false;
            }


            // if (is_null($id) && is_null($category)) {
            //     return true;
            // }else{
                
            // }
            
            
        }
       
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Fecha ocupada, ingrese otra';
    }
}
