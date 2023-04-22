<?php
    $url = "https://static.bongda24h.vn/medias/thumnail/2023/04/22/342012340_1601155450295068_3120707052138978810_n-2204181513.jpg";
    $newUrl = str_replace("https://static.bongda24h.vn/medias/thumnail", "https://image.bongda24h.vn/medias/original", $url);
    
    echo $newUrl; // Kết quả sẽ là https://image.bongda24h.vn/medias/original/2023/04/22/342012340_1601155450295068_3120707052138978810_n-2204181513.jpg
    
?>