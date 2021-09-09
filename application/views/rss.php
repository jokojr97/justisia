<?php
function limit_words($string, $word_limit){
    $words = explode(" ",$string);
    $words = str_replace('<p>', '', $words);
    $words = str_replace('<em>', '', $words);
    $words = str_replace('<p style="font-size:13px; font-style:italic; line-height:1.3; text-align:center"><span>&quot;', '', $words);
    $words = str_replace('</em>', '', $words);
    $words = str_replace('</em>', '', $words);
    $words = str_replace(array("\r","\n"), '', $words);
    $words = str_replace('</p>', '', $words);
    $words = implode(" ",array_splice($words,0,$word_limit));
    return $words;
}
function limit_words2($string, $word_limit){
    $words = explode(" ",$string);
    $words = str_replace('<p>', '', $words);
    $words = str_replace('<p style="font-size:13px; font-style:italic; line-height:1.3; text-align:center"><span>&quot;', '', $words);
    $words = str_replace('<em>', '', $words);
    $words = str_replace('</em>', '', $words);
    $words = str_replace(array("\r","\n"), '', $words);
    $words = str_replace('</p>', '', $words);
    $words = str_replace('<p>', '', $words);
    $words = implode(" ",array_splice($words,6,$word_limit));
    return $words;
} 

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<rss version="2.0"
    xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:atom="http://www.w3.org/2005/Atom"
	xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
	xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
	xmlns:georss="http://www.georss.org/georss" xmlns:geo="http://www.w3.org/2003/01/geo/wgs84_pos#" >
 
	<channel>
		<title><?php echo $feed_name; ?></title>
		<link><?php echo $feed_url; ?></link>
		<description><?php echo $page_description; ?></description>
		<language><?php echo $page_language; ?></language>
		<dc:creator><?php echo $creator_email; ?></dc:creator>	

		<dc:rights>Copyright <?php echo gmdate("Y", time()); ?></dc:rights>

		<?php foreach($posts as $row):?>
			
			<item>
				<title><?php echo $row->judul; ?></title>
				<link><?php echo base_url(strtolower($row->post_type_name)."/".$row->slug); ?></link>
				<guid><?php echo base_url(strtolower($row->post_type_name)."/".$row->slug); ?></guid>
				<pubDate><?php echo date(DATE_RFC1123, strtotime($row->date_created));?></pubDate>
				<description>
					<![CDATA[<?php echo strtolower($row->post_type_name) == "podcast" ? trim(limit_words2($row->deskripsi, 30)) : trim(limit_words($row->deskripsi, 30)); ?>. This article is copyright &copy; <?= date('Y', strtotime($row->date_created)); ?> &nbsp; <a href="<?= base_url(); ?>"><?= $feed_name ?></a>]]>
				</description>
                <content:encoded><![CDATA[ <img width="540" height="317" src="<?= base_url().'assets/images/'.$row->featured_image ?>" class="attachment-large size-large wp-post-image" alt="" style="width: 100%; margin: 10px;" srcset="<?= base_url().'assets/images/'.$row->featured_image ?> 540w, <?= base_url().'assets/images/'.$row->featured_image ?> 300w" sizes="(max-width: 540px) 100vw, 540px" /> <?= $row->deskripsi ?>]]></content:encoded>
                <?php 
                $kategori = $row->keywords;
                $kategories = explode(",", $kategori);
                foreach($kategories as $cat => $data){?>
                <category><![CDATA[<?= $data ?>]]></category>
                <?php } ?>
			</item>

		<?php endforeach; ?>

	</channel>
</rss>