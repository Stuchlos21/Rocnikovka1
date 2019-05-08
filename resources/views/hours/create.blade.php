@extends('layouts.app')
@extends('layouts.sidebar')
<?php
    $link = mysqli_connect("localhost", "root", "");
    mysqli_select_db($link, "db_rocnikova");
?>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Přidat novou hodinu!</div>
                    <div class="panel-body">
                        {!! Form::open(['action' => 'HourController@store', 'method' => 'POST']) !!}
                        <div>
                            {{Form::label('datum', 'Datum',['class' => 'form-label'])}}
                            {{Form::date('datum', '', ['class' => 'form-control', 'placeholder' => '19.12.2019', 'required', 'min' => ''])}}
                        </div>
                        
                        <div>
                            <label class="form-label">Vozidlo</label>
                            <div>
                                    <select name="id_vozidla" class="form-control">
                                        <?php
                                            $res = mysqli_query($link, "select * from cars");
                                            while($row = mysqli_fetch_array($res))
                                            {
                                        ?>
                                        <option> <?php echo $row["nazev"]." - ".$row["typ"]." - ".$row["barva_slovy"]; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                            </div>
                        </div>
                        
                        <div>
                            {{Form::label('Číslo_ve_dni', 'Číslo ve dni',['class' => 'form-label'])}}
                            {{Form::number('Číslo_ve_dni', '', ['class' => 'form-control', 'placeholder' => '1, 2, 3', 'required', 'min' => 0, 'max' => 15])}}
                        </div>

                        <div>
                            {{Form::hidden('barva', 'Barva',['class' => 'form-label'])}}
                            {{Form::hidden('barva', Auth::user()->barva, ['class' => 'form-control', 'required', 'readonly' => "readonly"])}}
                        </div>

                        <div>
                            {{Form::hidden('end_date', 'End_date',['class' => 'form-label'])}}
                            {{Form::hidden('end_date', '0001-01-01', ['class' => 'form-control', 'required', 'readonly' => "readonly"])}}
                        </div>
                         <br>
                            {{Form::submit('Odeslat', ['class' => 'btn btn-primary'])}}              
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection