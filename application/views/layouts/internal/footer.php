<footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Time</b> <?php echo $this->benchmark->elapsed_time()."sec";?> &nbsp;
          <b>Memory</b><?php echo $this->benchmark->memory_usage();?>
        </div>
        <strong>Copyright &copy; 2017 <a href="<?=site_url()?>">United trade and commerce</a>.</strong> All rights reserved. <?php //echo date('d-m-Y h:i:s')?>
      </footer>


      <div id="modal" class="modal" tabindex="-1" role="dialog">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 id="modal-title" class="modal-title">Modal title</h5>
		        
		      </div>
		      <div id="body" class="modal-body">
		        <p>Modal body text goes here.</p>
		      </div>
		      <div class="modal-footer">
		        
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>