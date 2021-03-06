@extends('layouts.homepage')

@section('content')
<div class="cover">
</div>
	<div class="tv">
		  <div class="screen mute" id="tv"></div>
    </div>
    
<div class="container">
    
    <!-- <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dashboard
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in !
                </div>
            </div>
        </div>
    </div> -->


    <div class="row">
        <div class="col-md-12">
            <div class="card atypikcard">
                <div class="card-header"><h3>Réservez votre logement insolite :</h3> </div>

                <div class="card-body">
                    <form method="GET" action="{{ route('recherche') }}">

                        @include('partials.form3', [
                            'title' => __('Destination'),
                            'type' => 'text',
                            'name' => 'destination',
                            'required' => true,
                            ])

                        <div class="form-group row">
                                <div class="col-md-12">
                                    <select id="voyageurs" name="voyageurs" class="form-control">

                                        <option value="" disabled selected hidden>Voyageurs</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        
                                    </select>    
                                </div>
                        </div> 
                        <div class="form-group row">
                        @include('partials.form2', [
                            'title' => __('Départ'),
                            'type' => 'date',
                            'name' => 'depart',
                            'required' => true,
                            ])

                        @include('partials.form2', [
                            'title' => __('Retour'),
                            'type' => 'date',
                            'name' => 'retour',
                            'required' => true,
                            ])
                        </div>
                        

                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary atypikbutton">
                                    Rechercher
                                </button>    
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection
