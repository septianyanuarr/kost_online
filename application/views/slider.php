<div class="slider-wrapper">
        <div class="slider">
             <div class="fs_loader"></div>
                <?php
                for ($i = 0; $i < count($slider); ++$i) {
                     if($i % 2==0){ 
                        echo ' 
             <div class="slide slide1">

                <img src="'.base_url().'assets/images/fraction-slider/'.$slider[$i]->bg.'" width="1920" height="auto" data-in="fade" data-out="fade" />
                <img class="ftm" src="'.base_url().'assets/images/kos_t/'.$slider[$i]->ft_utm.'"width="555" height="400" data-position="50,370" data-in="left" data-out="left" data-delay="3500"/>
            
                <p class="slide-heading" data-position="100,1200" data-in="top" data-out="bottom" data-delay="500">Kos '.$slider[$i]->ktg_r.'</p>
                <p class="slide-heading" data-position="180,1200" data-in="top" data-out="bottom" data-delay="2500">'.$slider[$i]->alm_ks.'</p>
                <a href="'.base_url().'index.php/user/lihat_kos/'.$slider[$i]->kd_kos_t.'" class="btn btn-default btn-lg" data-position="280,1200" data-in="bottom" data-out="top" data-delay="3000">Lihat kos</a>
            </div>';
            }else{ 
                echo'
            <div class="slide slide2">

                <img src="'.base_url().'assets/images/fraction-slider/'.$slider[$i]->bg2.'" width="1920" height="auto" data-in="fade" data-out="fade" />

                <img class="ftm" src="'.base_url().'assets/images/kos_t/'.$slider[$i]->ft_utm.'"width="555" height="400" data-position="50,1020" data-in="bottomLeft" data-out="fade" style="width:auto; height:auto" data-delay="500">

                <p class="slide-heading" data-position="130,380" data-in="top"  data-out="left" data-ease-in="easeOutBounce" data-delay="700">Kos '.$slider[$i]->ktg_r.'</p>

                <p class="sub-line" data-position="220,380" data-in="right" data-out="left" data-delay="1500">'.$slider[$i]->alm_ks.'</p>

                <a href="'.base_url().'index.php/user/lihat_kos/'.$slider[$i]->kd_kos_t.'"  class="btn btn-default btn-lg" data-position="315,380" data-in="bottom" data-out="bottom" data-delay="2000">Lihat kos</a>
            </div>';
            }} ?>
        </div>
    </div>