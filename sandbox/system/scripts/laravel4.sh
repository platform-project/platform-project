#!/bin/sh
CURRENT_PATH=`pwd`
SKELETON_PATH="$CURRENT_PATH/laravel/app/skeletons"
M_NAME="skeleton_model"
V_NAME="skeleton_view"
C_NAME="skeleton_controller"

generate_l4_skeleton_paths(){
  mkdir -p $SKELETON_PATH/controllers
  mkdir -p $SKELETON_PATH/models
  mkdir -p $SKELETON_PATH/views
}

generate_l4_skeleton_model(){
  echo "<?php

class Skeleton extends Eloquent {

  protected $table = 'skeletons';
  public $primaryKey = 'id';
  protected $key = 0;

  public function __construct($id=null){
    if (is_null($id)){
      $this->key = $this->getKey();
    } else {
      $this->key = $id;
    }
    parent::__construct();
  }

  public function setField($field){
    $this->field = $field;
  }

  public function getField(){
    return $this->field;
  }

}
" > $SKELETON_PATH/models/skeleton.php
}

generate_l4_skeleton_controller(){
  echo "<?php
class SkeletonController extends BaseController
{

  public function view_skeleton()
  {
    $page_title    = 'Scaffolding';
    $subpage_title = \"\";
    $header_title  = \"{$page_title} | Scaffolding | Laravel Skeleton\";
    $breadcrumbs   = array('Scaffolding' => '/path/to/skeleton);

    if ($keyword){
      $model = DB::table(Config::get('your_database.database_name'))
                                     ->where('column_name1', 'LIKE', '%'.$keyword.'%')
                                     ->orWhere('column_name2', 'LIKE', '%'.$keyword.'%')
                                     ->orWhere('column_name3', 'LIKE', '%'.$keyword.'%')
                                     ->orWhere('column_name4', 'LIKE', '%'.$keyword.'%')
                                     ->paginate(30);
    } else {
      $model = DB::table(Config::get('your_database.database_name'))->paginate(30);
    }

    $values        = array('header_title'  => $header_title,
                           'page_title'    => $page_title,
                           'breadcrumbs'   => $breadcrumbs,
                           'subpage_title' => $subpage_title,
                           'model'         => $model,
                           );
    return View::make('path.to.skeleton.view', $values);
  }
}
" > $SKELETON_PATH/controllers/skeleton_controller.php
}

generate_l4_skeleton_view(){
  echo "
@extends('path.to.skeleton.view.default')
@section('content')
<h2>{{ $subpage_title }}</h2>
{{ Form::open(array('route' => 'view.skeleton', 'method' => 'get')) }}
<div class=\"search row\">
  <div class=\"large-12 columns\">
    <div class=\"formLabel columns large-1\">
      {{ Form::label('keyword', 'Keyword') }} 
    </div>
    <div class=\"formInput columns large-9\">
      {{ Form::text('keyword', Input::get('keyword'), array('placeholder' => 'Enter Keyword', 'class' => 'left')) }}
    </div>
    <div class=\"formSubmit columns large-2\">
      {{ Form::submit('Search', array('class' => 'button tiny left')) }}
    </div>
  </div>
</div>
{{ Form::close() }}
<p></p><p></p>
@if(Session::has('notice'))
  <div class=\"row\">
    <div data-alert class=\"alert-box info radius large-12 columns\">
      {{ Session::get('notice') }}
    </div>
  </div>
@endif
@if (count($model) > 0)
<div class=\"pagination row\">
  <div class=\"large-4 columns\"><em>Model Name {{ $model->getFrom() }} to {{ $model->getTo() }} of {{ $model->getTotal() }}</em></div>
  <div class=\"large-8 columns\">{{ $model->appends(Request::except('page'))->links() }}</div>
</div>
@endif
<p></p>
<div class=\"model row\">
  <table width=\"100%\">
    <thead>
      <tr>
        <th width=\"20\">#ID</th>
        <th width=\"120\">Model Field 1</th>
        <th width=\"120\">Model Field 2</th>
        <th width=\"120\">Model Field 3</th>
        <th width=\"120\">Model Field 4</th>
        <th width=\"120\">Created Date</th>
        <th width=\"120\">Updated Date</th>
      </tr>
    </thead>
    <tbody>
    @if (count($model) > 0)
      @foreach ($model as $entry)
      <tr>
        <td valign=\"top\">
          {{ $entry->id }}
        </td>
        <td valign=\"top\">
          <a href=\"#{{ $entry->column_name1 }}\" target=\"_blank\"><span data-tooltip=\"{{ $entry->column_name3 }}\" data-options=\"show_on:large\" data-selector=\"tooltip-iduafovx0\" title=\"{{ $entry->current_message }}\" class=\"label secondary radius has-tip\" style=\"font-size: 10px\">{{ $entry->current_commit }}</span></a>
        </td>
        <td valign=\"top\">
          {{ $entry->column_name4 }}
        </td>
        <td valign=\"top\">
        @if ($entry->column_name4)
          <span class=\"label success radius\" style=\"font-size: 10px\">column_name4</span>
        @else
          <span class=\"label alert radius\" style=\"font-size: 10px\">Failed</span>
        @endif
        </td>
        <td valign=\"top\">
          {{ $entry->created_at }}
        </td>
        <td valign=\"top\">
          {{ $entry->updated_at }}
        </td>
      </tr>
      @endforeach
    @else 
      <tr>
        <td valign=\"top\" colspan=\"5\">No items to display</td>
      </tr>
    @endif
    </tbody>
  </table>
  @if (count($model) > 0)
  <div class=\"pagination row\">
  <div class=\"large-4 columns\"><em>Model Name{{ $model->getFrom() }} to {{ $model->getTo() }} of {{ $model->getTotal() }}</em></div>
  <div class=\"large-8 columns\">{{ $model->appends(Request::except('page'))->links() }}</div>
  @endif
</div>
</div>
@stop

" > $SKELETON_PATH/views/skeleton.blade.php
}

generate_l4_skeleton_paths
generate_l4_skeleton_model
generate_l4_skeleton_view
generate_l4_skeleton_controller
