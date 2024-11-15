<x-layout>
   
        <h1>Dettaglio Annuncio</h1>
        <div class="container" >
            <div class="row justify-content-center">
                <div class="col-12  mb-4 d-flex justify-content around" >
                   
                    
                    <x-cardShow :announcement="$announcement" />
                    
                 
                </div>
            </div>   
        </div> 
        {{-- PAGINAZIONE SE NON CAPITE COSA SIA --}}
       
    </x-layout>