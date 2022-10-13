<div class="content-wrapper">
          <div class="row">
            <?php
			if($this->agent->is_mobile){
				$this->load->view('pes/mobile_transearch');
			}else{
				$this->load->view('pes/web_transearch');
			}
			?>
          </div>
        </div>