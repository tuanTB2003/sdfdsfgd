
<div class="mb-5">
    <?php foreach($cmts2 as $value):?>
        <?php if($value['an'] == 0){?>
        <div>
            <div class='d-flex gap-2'>
                <div>
                    <img src="./access/img/avatar/<?php echo $value["hinh"]?>" alt="" class='avatar_comment'>

                </div>
                <div>
                    <p class="text-muted f-13"><?php echo $value['ho_ten']?></p> 
                    <p class="text-muted f-13"><?php echo $value['ngay_bl']?></p>

                </div>
            </div>
            <p class='ms-5'><?php echo $value['noi_dung']?></p>
            <?php foreach($viewRep as $value2):?>
                <?php if($value2['an'] == 0){?>
                    <?php if($value2['id_binh_luan'] == $value['id']){?>
                        <div class='mt-5 m-left'>
                            <div class='d-flex gap-2'>
                                <div>
                                    <img src="./access/img/avatar/<?php echo $value2["hinh"]?>" alt="" class='avatar_comment'>
                                </div>
                                <div>
                                    <p class="text-muted f-13"><?php echo $value2['ho_ten']?></p> 
                                    <p class="text-muted f-13"><?php echo $value2['ngay_binh_luan']?></p>

                                </div>
                            </div>
                            <p class='ms-5'><?php echo $value2['noi_dung']?></p>
                        </div>
                    <?php }?>
                <?php }else{echo'';}?>    
            <?php endforeach; ?>
            <?php     
                if(empty($_SESSION)){
            ?>
                <a href ='login.php' class="d-flex align-items-center gap-3 text-decoration-none pl-5">
                    <i class="bi bi-arrow-return-left"></i>
                    Trả lời
                </a>
            <?php }else{?> 
                <div class='pl-5 '>
                    <div class="d-flex align-items-center gap-3  text-decoration-none pl-5  reply">
                        <i class="bi bi-arrow-return-left"></i>
                        Trả lời
                    </div>
                    <div class= 'form_reply'>
                        <form action='index.php?c=detail&id=<?php foreach($productDetail as $data){echo $data["id"];}?>&idrep=<?php echo $value["id"]?>' method='post'  class='mt-3 ml-5 m-left'>
                            <div class="form-floating">
                                <textarea class="form-control" name='repcmt' placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Comments</label>
                            </div>
                            <!-- <?php echo isset($errCmt) ? "<p class='err' for=''>$errCmt</p class='err'>" : "" ?> -->
                            <input type="date" name='date' hidden  value='<?php echo date('Y-m-d'); ?>'>
                            <button type='submit' name='submit_rep' class="btn bg-success text-white fw-bold mt-4 text-right">Gửi</button>
                        </form>

                    </div>
                </div>
            <?php }?> 
            <div class="my-5">
                <hr class='dropdown-divider'/>
            </div>
        </div>
        <?php }else{echo'';}?>

    <?php endforeach; ?>
</div>