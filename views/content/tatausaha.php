<?php if(!defined('BASEPATH')) exit('No direct script access allowed') ?>

<?php
switch($tp){

case 'periksa':
?>

<div role="main" class="content-main" style="margin:120px 0 50px">
    <div class="wrapper-half">
		<script type="text/javascript" src="<?php echo base_url();?>static/js/form.js" ></script>
        <!-- <h1 class="page-title page-title-border">Detail Pemeriksaan Proposal Hibah Bansos Masuk</h1> -->
        <?php
        if(isset($_SESSION['notify'])){
            echo '<div class="alert-bar alert-bar-'.$_SESSION['notify']['type'].'" style="width:100%">'.$_SESSION['notify']['message'].'</div>';
            unset($_SESSION['notify']);
        }            
        ?>

        <form action="<?php echo base_url('process/tatausaha/periksa/'.$dx) ?>" method="post" class="form-check form-global">
            <h1 class="page-title page-title-border">Detail Pengecekan Dokumen</h1>
            <ul class="category-list list-nostyle">
                <li>
                    <h3 style="color:#ec7404">Kategori</h3>
                </li>
                <li>
                    <select name="kategori">
                    <option value="0">-- Silahkan Pilih</option>
                    <?php
                    $Qkategori = $this->db->select("id, name")->from('proposal_type')->order_by('id', 'ASC')->limit(2)->get();

                    foreach($Qkategori->result_object() as $kategori){
                        echo '<option value="'.$kategori->id.'">'.$kategori->name.'</option>';
                    }
                    ?>
                    </select>
                </li>

				<li>
                    <select id="kategori3" name="kategori3" onchange="jsFunction2()">
                    <option value="0">-- Status Lembaga</option>
					
					<option value="1">Yayasan atau Ormas Berbadan Hukum</option>
					<option value="2">Kelompok Masyarakat / Kesatuan Masyarakat Hukum Adat </option>
					<option value="3">Lembaga Nirlaba, Sukarela dan Sosial</option>
                    <?php
                   /*  $Qkategori2 = $this->db->select("id, name")->from('proposal_jenis')->order_by('id', 'ASC')->limit(2) ->get();

                    foreach($Qkategori2->result_object() as $kategori2){
                        echo '<option value="'.$kategori2->id.'">'.$kategori2->name.'</option>';
                    } */
                    ?>
                    </select>
                </li>

		
                <?php

		
                $Qlist1 = $this->db->select("id, name")->from('checklist')->where('role_id', 5)->order_by('sequence', 'ASC')->limit(4,13)->get();
				
                foreach($Qlist1->result_object() as $list1){
                    //<label class="checkbox" id="id'.$list2->id.'">
					
					if($list1->id == 33){
						echo '<li>
                            <label class="checkbox" id="id'.$list1->id.'" >
                                <input type="checkbox" name="kelengkapan[]" value="'.$list1->id.'">
                                '.$list1->name.'
                            </label>
                        </li>';
					}else{
						echo '<li>
                            <label class="checkbox" id="id'.$list1->id.'" style="display:none" >
                                <input type="checkbox" name="kelengkapan[]" value="'.$list1->id.'">
                                '.$list1->name.'
                            </label>
                        </li>';
					}
					
                }
                ?>
            </ul>
			
            <h1 class="page-title page-title-border" >Persyaratan Administrasi</h1>
			
			
            <ul class="category-list list-nostyle">
				<li>
					<select id="kategori2" name="kategori2" onchange="jsFunction()">
					<option value="0">-- Jenis</option>
					<?php
					$Qkategori2 = $this->db->select("id, name")->from('proposal_jenis')->order_by('id', 'ASC')->limit(2) ->get();

					foreach($Qkategori2->result_object() as $kategori2){
						echo '<option value="'.$kategori2->id.'">'.$kategori2->name.'</option>';
					}
					?>
					</select></br>
				</li>
			
                <?php
                $Qlist2 = $this->db->select("id, name")->from('checklist')->where('role_id', 5)->order_by('sequence', 'ASC')->limit(21,17)->get();

                foreach($Qlist2->result_object() as $list2){
                    echo '<li>
                            <label class="checkbox" id="id'.$list2->id.'">
                                <input type="checkbox" name="persyaratan[]" value="'.$list2->id.'">
                                '.$list2->name.'
                            </label>
                        </li>';
                }
                ?>
            </ul>
			
			
			<script type="text/javascript">
				function jsFunction()
				{
				
					if (document.getElementById("kategori2").value == "1"){
					//alert("fisik")
						var link = document.getElementById('id44')
						link.style.display = 'inherit';
						var link = document.getElementById('id46')
						link.style.display = 'inherit';
						var link = document.getElementById('id47')
						link.style.display = 'inherit';
						var link = document.getElementById('id48')
						link.style.display = 'inherit';
					}else{
					//alert("non fisik")
						var link = document.getElementById('id44')
						link.style.display = 'none';
						var link = document.getElementById('id46')
						link.style.display = 'none';
						var link = document.getElementById('id47')
						link.style.display = 'none';
						var link = document.getElementById('id48')
						link.style.display = 'none';
					}
					

				}
				
				function jsFunction2()
				{
					//alert($id_option);
					if (document.getElementById("kategori3").value == "1"){
					//alert("fisik");
						var link = document.getElementById('id35')
						link.style.display = 'inherit';
						var link = document.getElementById('id36')
						link.style.display = 'none';
						var link = document.getElementById('id37')
						link.style.display = 'none';
					}else if (document.getElementById("kategori3").value == "2"){
					//alert("non fisik");
						var link = document.getElementById('id35')
						link.style.display = 'none';
						var link = document.getElementById('id36')
						link.style.display = 'inherit';
						var link = document.getElementById('id37')
						link.style.display = 'none';
					}else if(document.getElementById("kategori3").value == "3"){
						var link = document.getElementById('id35')
						link.style.display = 'none';
						var link = document.getElementById('id36')
						link.style.display = 'none';
						var link = document.getElementById('id37')
						link.style.display = 'inherit';
					}else {
						var link = document.getElementById('id35')
						link.style.display = 'none';
						var link = document.getElementById('id36')
						link.style.display = 'none';
						var link = document.getElementById('id37')
						link.style.display = 'none';
					}
					

				}
			</script> 
           <!-- <p>Pengecualian poin 1, 3, 5, 6 untuk proposal yang berkaitan dengan tempat peribadatan, pondok pesantren dan kelompok swadaya masyarakat yang bersifat non-formal dan pengelolaannya berupa partisipasi swadaya masyarakat.</p> -->

            <h3 style="color:#ec7404">Keterangan</h3>
            <textarea rows="5" name="keterangan"></textarea>

            <div class="control-actions">
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['sabilulungan']['uid']; ?>">
                <input type="hidden" name="role_id" value="<?php echo $_SESSION['sabilulungan']['role']; ?>">
                <input type="submit" name="lanjut" class="btn-red btn-plain btn" style="display:inline" value="Lanjut ke Pemeriksaan oleh Walikota" />
                <input type="submit" name="tolak" class="btn-red btn-plain btn" style="display:inline" value="Ditolak" />
                <a href="<?php echo site_url('report') ?>" class="btn-grey btn-plain btn" style="display:inline">Kembali</a>
            </div>
        </form>
    </div>
</div>
<!-- content-main -->

<?php
break;

case 'edit':

$Qedit = $this->db->query("SELECT type_id FROM proposal WHERE `id`='$dx'"); $edit = $Qedit->result_object();

$Qedit1 = $this->db->query("SELECT checklist_id, value FROM proposal_checklist WHERE `proposal_id`='$dx' AND checklist_id BETWEEN 1 AND 13");
?>

<div role="main" class="content-main" style="margin:120px 0 50px">

	<script type="text/javascript" src="<?php echo base_url();?>static/js/form.js" ></script>
	
    <div class="wrapper-half">
        <!-- <h1 class="page-title page-title-border">Detail Pemeriksaan Proposal Hibah Bansos Masuk</h1> -->
        <?php
        if(isset($_SESSION['notify'])){
            echo '<div class="alert-bar alert-bar-'.$_SESSION['notify']['type'].'" style="width:100%">'.$_SESSION['notify']['message'].'</div>';
            unset($_SESSION['notify']);
        }            
        ?>

        <form action="<?php echo base_url('process/tatausaha/edit/'.$dx) ?>" method="post" class="form-check form-global">
            <h1 class="page-title page-title-border">Detail Pengecekan Dokumen</h1>
            <ul class="category-list list-nostyle">
                <li>
                    <h3 style="color:#ec7404">Kategori</h3>
                </li>
                <li>
                    <select name="kategori">
                    <option value="0">-- Silahkan Pilih</option>
                    <?php
                    $Qkategori = $this->db->select("id, name")->from('proposal_type')->order_by('id', 'ASC')->limit(2)->get();

                    foreach($Qkategori->result_object() as $kategori){
                        echo '<option value="'.$kategori->id.'">'.$kategori->name.'</option>';
                    }
                    ?>
                    </select>
                </li>

				<li>
                    <select id="kategori2" name="kategori2" onchange="jsFunction()">
                    <option value="0">-- Jenis</option>
                    <?php
                    $Qkategori2 = $this->db->select("id, name")->from('proposal_jenis')->order_by('id', 'ASC')->limit(2) ->get();

                    foreach($Qkategori2->result_object() as $kategori2){
                        echo '<option value="'.$kategori2->id.'">'.$kategori2->name.'</option>';
                    }
                    ?>
                    </select>
                </li>
                <?php

		
                $Qlist1 = $this->db->select("id, name")->from('checklist')->where('role_id', 5)->order_by('sequence', 'ASC')->limit(4,13)->get();

                foreach($Qlist1->result_object() as $list1){
                    echo '<li>
                            <label class="checkbox">
                                <input type="checkbox" name="kelengkapan[]" value="'.$list1->id.'">
                                '.$list1->name.'
                            </label>
                        </li>';
                }
                ?>
            </ul>

            <h1 class="page-title page-title-border">Persyaratan Administrasi</h1>
            <ul class="category-list list-nostyle">
                <?php
                $Qlist2 = $this->db->select("id, name")->from('checklist')->where('role_id', 5)->order_by('sequence', 'ASC')->limit(21,17)->get();

                foreach($Qlist2->result_object() as $list2){
                    echo '<li>
                            <label class="checkbox" id="id'.$list2->id.'">
                                <input type="checkbox" name="persyaratan[]" value="'.$list2->id.'">
                                '.$list2->name.'
                            </label>
                        </li>';
                }
                ?>
            </ul>
			
			<script type="text/javascript">
				function jsFunction()
				{
				
					if (document.getElementById("kategori2").value == "1"){
					//alert("fisik")
						var link = document.getElementById('id44')
						link.style.display = 'inherit';
						var link = document.getElementById('id46')
						link.style.display = 'inherit';
						var link = document.getElementById('id47')
						link.style.display = 'inherit';
						var link = document.getElementById('id48')
						link.style.display = 'inherit';
					}else{
					//alert("non fisik")
						var link = document.getElementById('id44')
						link.style.display = 'none';
						var link = document.getElementById('id46')
						link.style.display = 'none';
						var link = document.getElementById('id47')
						link.style.display = 'none';
						var link = document.getElementById('id48')
						link.style.display = 'none';
					}
					

				}
			</script> 

            <!-- <p>Pengecualian poin 1, 3, 5, 6 untuk proposal yang berkaitan dengan tempat peribadatan, pondok pesantren dan kelompok swadaya masyarakat yang bersifat non-formal dan pengelolaannya berupa partisipasi swadaya masyarakat.</p> -->

            <h3 style="color:#ec7404">Keterangan</h3>
            <textarea rows="5" name="keterangan"><?php foreach($Qedit1->result_object() as $edit1) if($edit1->value != NULL) echo $edit1->value ?></textarea>

            <div class="control-actions">
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['sabilulungan']['uid']; ?>">
                <input type="hidden" name="role_id" value="<?php echo $_SESSION['sabilulungan']['role']; ?>">
                <input type="submit" name="lanjut" class="btn-red btn-plain btn" style="display:inline" value="Simpan" />
                <!-- <input type="submit" name="tolak" class="btn-red btn-plain btn" style="display:inline" value="Ditolak" /> -->
                <a href="<?php echo site_url('report') ?>" class="btn-grey btn-plain btn" style="display:inline">Kembali</a>
            </div>
        </form>
    </div>
</div>
<!-- content-main -->

<?php
break;

}