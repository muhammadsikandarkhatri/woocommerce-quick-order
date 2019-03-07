<?php global $product; ?>
<form class="form-horizontal" action="" method="post" >
    <fieldset>

    <!-- Full Name input-->
    <div class="form-group">
          <label class="col-md-3 control-label" for="name">Full Name</label>
          <div class="col-md-9">
            <input id="first_name" name="full_name" required type="text" placeholder="Your First name" class="form-control">
          </div>
    </div>

    <!-- Email input-->
    <div class="form-group">
      <label class="col-md-3 control-label" for="email">Your E-mail</label>
      <div class="col-md-9">
        <input id="email" name="email" type="text" required placeholder="Your email" class="form-control">
      </div>
    </div>


     <!-- Phone input-->
    <div class="form-group">
      <label class="col-md-3 control-label" for="email">Your Phone</label>
      <div class="col-md-9">
        <input id="phone" name="phone" type="text" required placeholder="Your phone" class="form-control">
      </div>
    </div>

    <!-- Address body -->
    <div class="form-group">
      <label class="col-md-3 control-label" for="message">Your Address</label>
      <div class="col-md-9">
        <textarea class="form-control" id="address" required name="address" placeholder="Please enter your address..." rows="5"></textarea>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-3 control-label" for="message">Select Quantity</label>
      <div class="col-md-9">
        <select name="quantity" id="quantity" required>
            <option value="1" selected="selected">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
      </div>
    </div>

    <div class="form-group">
        <label class="col-md-12 control-label">Total Amount <span class="total_quick_order_amount">Rs <?php echo $product->price; ?></span></label>
    </div>

    <!-- Form actions -->
    <div class="form-group">
      <div class="col-md-12 text-right">
        <button type="submit" name="submit" class="btn btn-primary btn-lg">Submit</button>
      </div>
    </div>
    </fieldset>
    <input type="hidden" name="custom_price" id="custom_price" value="<?php echo $product->price; ?>">

</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script type="text/javascript">
$( document ).ready(function() {
    var qty;
    var total;
    $("#quantity").change(function () {
        qty = $(this).val();
        total =	parseInt($('#custom_price').val()) * parseInt(qty);
        $('.total_quick_order_amount').text('Rs '+total.toFixed(2));
    });

//    $(":input").bind('keyup mouseup', function () {
//        qty = $(this).val();
//        total =	parseInt($('#custom_price').val()) * parseInt(qty);
//        $('.total_quick_order_amount').text('Rs '+total.toFixed(2));
//    });
});
</script>