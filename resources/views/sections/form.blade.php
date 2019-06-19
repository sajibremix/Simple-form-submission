@extends('layout')
{{header('Content-Type: text/html; charset=utf-8')}}

@section('content')
       <form class="well form-horizontal simple_form" action="{{route('forms.store')}}" method="POST">
        @csrf
          <fieldset>
            <h2 class="text-center">Your form</h2> 
            <hr>
             <div class="form-group">
                <label class="col-md-4 control-label">Amount</label>
                <div class="col-md-8 inputGroupContainer">
                   <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span><input name="amount" placeholder="Amount" class="form-control" required="true" value="" type="number"></div>
                   <p class="error"></p>
                </div>
             </div>
             <div class="form-group">
                <label class="col-md-4 control-label">Buyer</label>
                <div class="col-md-8 inputGroupContainer">
                   <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input name="buyer" placeholder="Buyer" class="form-control" required="true" value="" type="text"></div>
                   <p class="error"></p>
                </div>
             </div>
             <div class="form-group">
                <label class="col-md-4 control-label">Receipt id</label>
                <div class="col-md-8 inputGroupContainer">
                   <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span><input name="receipt_id" placeholder="Receipt id" class="form-control" required="true" value="" type="text"></div>
                   <p class="error"></p>
                </div>
             </div>


             <div>
               <div class="all_item_wrapper">
                 
                 <div class="form-group single_item_wrapper">
                    <label class="col-md-4 control-label">Items</label>
                    <div class="col-md-8 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span><input name="items[]" placeholder="Items" class="form-control" required="true" value="" type="text"></div>
                       <p class="error"></p>
                    </div>
                 </div>

               </div>

               <div class="form-group">
                  <label class="col-md-4 control-label"></label>
                  <div class="col-md-8 inputGroupContainer">
                     <button class="btn btn-info" type="button" onclick="add_more_item();">Add more</button>
                  </div>
               </div>

             </div>
             



             <div class="form-group">
                <label class="col-md-4 control-label">buyer_email</label>
                <div class="col-md-8 inputGroupContainer">
                   <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span><input name="buyer_email" placeholder="Buyer email" class="form-control" required="true" value="" type="text"></div>
                   <p class="error"></p>
                </div>
             </div>
             <div class="form-group">
                <label class="col-md-4 control-label">Note</label>
                <div class="col-md-8 inputGroupContainer">
                   <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span><textarea name="note" placeholder="Note" class="form-control" required="true" rows="5"></textarea></div>
                   <p class="error"></p>
                </div>
             </div>
             <div class="form-group">
                <label class="col-md-4 control-label">City</label>
                <div class="col-md-8 inputGroupContainer">
                   <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span><input name="city" placeholder="City" class="form-control" required="true" value="" type="text"></div>
                   <p class="error"></p>
                </div>
             </div>
             <div class="form-group">
                <label class="col-md-4 control-label">Phone</label>
                <div class="col-md-8 inputGroupContainer">
                   <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input name="phone" placeholder="Phone" class="form-control" required="true" value="" type="number"></div>
                   <p class="error"></p>
                </div>
             </div>
             <div class="form-group">
                <label class="col-md-4 control-label">Entry by</label>
                <div class="col-md-8 inputGroupContainer">
                   <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span><input name="entry_by" placeholder="Entry by" class="form-control" required="true" value="" type="number"></div>
                   <p class="error"></p>
                </div>
             </div>

             <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-8 inputGroupContainer">
                   <button type="submit" class="btn btn-primary">Submit</button>
                </div>
             </div>
          </fieldset>
       </form>
@endsection


