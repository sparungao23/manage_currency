
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

    <?php if ($this->session->flashdata('flashSuccess')): ?>
        <div class='alert alert-success alert-dismissable'>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $this->session->flashdata('flashSuccess')?>
        </div>
    <?php endif?>

    <?php if ($this->session->flashdata('flashError')): ?>
        <div class='alert alert-danger alert-dismissable'>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $this->session->flashdata('flashError') ?>
        </div>
    <?php endif?>


    <h2 class="h2">Manage Currencies</h2>
    <div class="float-right">
        <input type="button" class="btn btn-primary" value="Add currency"
         data-toggle="modal" data-target="#addCurrencyModal"/>
        <input type="button" class="btn btn-success" value="Update rates"
        data-toggle="modal" data-target="#updateAllCurrenciesModal" />
    </div>    
    <br class="clear" /><br class="clear" />
    <div class="table-responsive">
    <table class="table table-striped table-sm" id="rates">
      <thead>
        <tr>
          <th>Currency</th>
          <th>Rate</th>
          <th>Country</th>
          <th>Date Updated</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($results as $result): ?>
            <tr>
              <td><?php echo $result->currency; ?></td>
              <td><?php echo $result->rate; ?></td>
              <td><?php echo $result->country; ?></td>
              <td><?php echo $result->updated_at; ?></td>
              <td>
                <input type="button" class="btn btn-success btn-sm updateCurrency"
                 data-id="<?php echo $result->id ?>" 
                 data-currency="<?php echo $result->currency; ?>"
                 data-toggle="modal" data-target="#updateCurrencyModal"
                 value="Update" />
              </td>
            </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    </div>
</main>



<!-- Modal -->
<div class="modal fade" id="addCurrencyModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <form action="<?= base_url('/dashboard/create') ?>" method="post">
            <div class="modal-header">
              <h4 class="modal-title">Add Currency Form</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="formGroupExampleInput">Currency</label>
                <select  class="form-control" name="ddCurrency" id="ddCurrency formGroupExampleInput">
                    <?php foreach($newCurrencies as $key => $currency): ?>
                        <option value="<?php echo $key."|".$currency; ?>"><?php echo $key; ?></option>
                    <?php endforeach; ?>        
                </select>    
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
      
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="updateCurrencyModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <form action="<?= base_url('/dashboard/update') ?>" method="post">
            <div class="modal-header">
              <h4 class="modal-title">Update Currency Form</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                Are you sure you want to get the latest exchange rates of this currency
                <span class='font-weight-bold' id="txtCurrency"></span>?
                <input type="hidden" name="hdCurrencyId" id="hdCurrencyId" value="" />
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
      
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="updateAllCurrenciesModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <form action="<?= base_url('/dashboard/updateAllCurrencies') ?>" method="post">
            <div class="modal-header">
              <h4 class="modal-title">Update All Existing Currencies Form</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                Are you sure you want to get the latest exchange rates for all the existing currencies?
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
      
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#rates').DataTable();

        $('.updateCurrency').on('click', function () {
            $('#hdCurrencyId').val($(this).attr('data-id'));
            $('#txtCurrency').text($(this).attr('data-currency'));
        });       
    });
</script>