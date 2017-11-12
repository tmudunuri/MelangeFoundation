<?php
    $strOutput = "";
    $strOutput .=  "<div class='listview grid'>\n";

    if( $xml === false ) {
        echo 'Sorry there has been a problem with your feed.';
    } else {
 
        $xml->registerXPathNamespace('gphoto', 'http://schemas.google.com/photos/2007');
        $xml->registerXPathNamespace('media', 'http://search.yahoo.com/mrss/');

        // register namespace to get access to total number of albums found
        $xml->registerXPathNamespace('opensearch', 'http://a9.com/-/spec/opensearch/1.1/');
        $totalResults = $xml->xpath( "opensearch:totalResults" );
        $total_num_albums = $totalResults[0];

        // I used this to echo xml to screen, view html and copy and paste feed into .xml then open up in safari to view 
        // echo $xml->asXML();die();

        $arrAlbumID = array(); // array to hold album ids
        // loop over the albums
        foreach( $xml->entry as $feed ) {

            // get the data we need
            $title = $feed->title;

            // do not display if album name has been hidden
            if(!in_array( $title, $hide_albums )){

                $gphoto = $feed->children('http://schemas.google.com/photos/2007');
                $num_photos = $gphoto->numphotos; 
                $published = $feed->published; 
                $published = trim( $published );
                $published = substr( $published, 0, 10 );      

                $group = $feed->xpath('./media:group/media:thumbnail');
                $a = $group[0]->attributes(); // we need thumbnail path
                $id = $feed->xpath('./gphoto:id'); // and album id for our thumbnail

                $strOutput .=  "<div class='thumbnail'>\n";
                    $strOutput .=  "<div class='thumbimagexx thumbnail grid-item' style='width: " . $thumb_size . "px; '>\n";
                        
                    if ( get_option( 'permalink_structure' ) ) { 
                        $urltitle = urlencode( $title );
                        $strOutput .=  "<a href='" . $results_page . "?cws_album=$id[0]&cws_album_title=$urltitle'><img alt='$title' src='$a[0]' title='$title' /></a>\n";
                    } else {
                        $urltitle = urlencode( $title );
                        $strOutput .=  "<a href='" . $results_page . "&cws_album=$id[0]&cws_album_title=$urltitle'><img alt='$title' src='$a[0]' title='$title' /></a>\n";
                    }
                        
                    $strOutput .=  "</div>\n"; // End .thumbimage

                $strOutput .=  "<div class='details'>\n";

                    $strOutput .=  "<ul>\n";

                    if ( $show_title ) {
                        $urltitle = urlencode( $title );
                        $strOutput .=  "<li class='title'><a href='" .$results_page . "?cws_album=$id[0]&cws_album_title=$urltitle'>$title</a></li>\n";
                    }
                    if ( $show_details ) {
                        $strOutput .= "<li class='details-meta'>Published: $published";
                        $strOutput .= "<li class='details-meta'>Images: $num_photos";
                    }

                    $strOutput .=  "</ul>\n";
                $strOutput .=  "</div>\n"; // End .details
            $strOutput .=  "</div>\n"; // End .thumbnail

                $arrAlbumID[] = (string)$id[0]; // cast simplexml object to string
            } // end do not display
        }

    }   // end else 
    
    $strOutput .=  "</div>\n"; // End .listview