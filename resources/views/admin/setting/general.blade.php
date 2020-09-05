<div class="tile">
    <form action="{{ route('admin.settings.update') }}" method="POST" role="form">
        @csrf
        <h3 class="tile-title">General Settings</h3>
        <hr>
        <div class="tile-body">

             <!-- Info scadenza-->
             <div class="jumbotron">
                <div class="form-group">
                    <label class="control-label"> Scadenza espressa in giorni in cui il prodotto viene ritirato dalla vendita </label>
                    <input
                        class="form-control"
                        type="number"
                        min="1"
                        id="scadenza_giorni"
                        name="scadenza_giorni"
                        value="{{ config('settings.scadenza_giorni') }}"
                    />
                </div>


                <div class="form-group">
                    <label class="control-label" for="indirizzo">Sconto in percentuale (secondo giorno) </label>
                    <input
                        class="form-control"
                        type="number"
                        min="0"
                        max="99"
                        id="sconto_2"
                        name="sconto_2"
                        value="{{ config('settings.sconto_2') }}"
                    />
                </div>


                <div class="form-group">
                    <label class="control-label" for="indirizzo">Sconto in percentuale dopo il secondo giorno </label>
                    <input
                        class="form-control"
                        type="number"
                        min="0"
                        max="99"
                        id="sconto_3"
                        name="sconto_3"
                        value="{{ config('settings.sconto_3') }}"
                    />
                </div>


             </div>

             <!-- Altre Info-->

            <div class="jumbotron">
                <div class="form-group">
                   
                </div>
 
            </div>


        </div>
        <div class="tile-footer">
            <div class="row d-print-none mt-2">
                <div class="col-12 text-right">
                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Settings</button>
                </div>
            </div>
        </div>
    </form>
</div>