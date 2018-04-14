@extends('layouts.lay-admin')

@section('content')
<head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
        
        <!-- (Optional) Latest compiled and minified JavaScript translation files -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>
        
</head>
<div>
    <h3><i> Select Guide </i> </h3>
<form action = "{{ action('AdminController@teamconfirm') }}" method ="POST">
        <div class="form-group">
    <select  id="list" name="list" class="selectpicker" data-live-search="true" >
        
        <?php
        // A sample product array
        
        
        // Iterating through the product array
        foreach($faculty as $fac){
        ?>
        <option value="<?php echo strtolower($fac->id); ?>">
            <?php echo $fac->name; ?>
        </option>
        
        <?php
        }
        ?>
          
    </select>
        </div>
    
      <input type="hidden" id="groupid" name="groupid" value= <?php echo $groupid ?>> 
    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
    <br>
<input type="submit" value="Submit" class="btn btn-primary">
</form>
<a href="/createfaculty/"><i>click here to create a faculty</i></a>
@endsection