<?php

	//########################//
	// 
	// Author :Harish Chauhan
	// Created : 7July 2005
	// 
	//########################//

	/*
	* This class is for generating barcodes in diffrenct encoding symbologies.
	* It supports EAN-13,EAN-8,UPC-A,UPC-E,ISBN ,2 of 5 Symbologies(std,ind,interleaved),postnet,
	* codabar,code128,code39,code93 symbologies.
	* 
	* This program is distributed in the hope that it will be useful,
	* but WITHOUT ANY WARRANTY; without even the implied warranty of
	* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
	* 
	* Requirements : PHP with GD library support. 
	* 
	* Reference : http://www.barcodeisland.com/symbolgy.phtml
	*/
	
	class BARCODE
	{
		var $_encode;
		var $_error;
		var $_width;
		var $_height;
		var $_scale;
		var $_color;
		var $_font;
		var $_bgcolor;
		var $_format;
		var $_n2w;
		
		function BARCODE($encoding="EAN-13")
		{
			
			if(!function_exists("imagecreate"))
			{
				die("This class needs GD library support.");
				return false;
			}

			$this->_error="";
			$this->_scale=2;
			$this->_width=0;
			$this->_height=0;
			$this->_n2w=2;
			$this->_height=60;
			$this->_format='png';
			
		    $this->_font='./roboto.ttf';
			$this->setSymblogy($encoding);
			$this->setHexColor("#000000","#FFFFFF");
		}

		function setFont($font,$autolocate=false)
		{
			/*$this->_font=$font;
			if($autolocate)
			{  
				$this->_font=dirname($_SERVER["PATH_TRANSLATED"])."/".$font.".ttf";
			
				if (isset($_SERVER['WINDIR']) && file_exists($_SERVER['WINDIR']))
				   $this->_font=$_SERVER['WINDIR']."\Fonts\\".$font.".ttf";
			}*/
		}

		function setSymblogy($encoding="EAN-13")
		{
			$this->_encode=strtoupper($encoding);
		}
		
		function setHexColor($color,$bgcolor)
		{
			$this->setColor(hexdec(substr($color,1,2)),hexdec(substr($color,3,2)),hexdec(substr($color,5,2)));
			$this->setBGColor(hexdec(substr($bgcolor,1,2)),hexdec(substr($bgcolor,3,2)),hexdec(substr($bgcolor,5,2)));
		}

		function setColor($red,$green,$blue)
		{
			$this->_color=array($red,$green,$blue);
		}

		function setBGColor($red,$green,$blue)
		{
			$this->_bgcolor=array($red,$green,$blue);
		}
		
		function setScale($scale)
		{
			$this->_scale=$scale;
		}
		
		function setFormat($format)
		{
			$this->_format=strtolower($format);
		}

		function setHeight($height)
		{
			$this->_height=$height;
		}

		function setNarrow2Wide($n2w)
		{
			if($n2w<2)
				$n2w=3;
			$this->_n2w=$n2w;
		}
		
		function error($asimg=false)
		{
			if(empty($this->_error))
				return "";
			if(!$asimg)
				return $this->_error;
			

			@header("Content-type: image/png");
			$im=@imagecreate(250,100);
			$color = @imagecolorallocate($im,255,255,255);
			$color = @imagecolorallocate($im,0,0,0);
			@imagettftext($im,10,0,5,50,$color,$this->_font , wordwrap($this->_error, 40, "\n"));
			@imagepng($im);
			@imagedestroy($im);
		}

		function genBarCode($barnumber,$format="gif",$file="")
		{
			
			$this->setFormat($format);

			if($this->_encode=="CODE39" )
			{
				$this->_c39Barcode($barnumber,$this->_scale,$file,false);
			}
			
		}

		/// Start function for code39
		
		/*A Code 39 barcode has the following structure:

		A start character - the asterisk (*) character. 
		Any number of characters encoded from the table below. 
		An optional checksum digit calculated as described above and encoded from the table below. 
		A stop character, which is a second asterisk character. */

		function _c39Encode($barnumber,$checkdigit=false)
		{
			$encTable=array("0" => "NNNWWNWNN",
							"1" => "WNNWNNNNW",
							"2" => "NNWWNNNNW",
							"3" => "WNWWNNNNN",
							"4" => "NNNWWNNNW",
							"5" => "WNNWWNNNN",
							"6" => "NNWWWNNNN",
							"7" => "NNNWNNWNW",
							"8" => "WNNWNNWNN",
							"9" => "NNWWNNWNN",
							"A" => "NNWWNNWNN",
							"B" => "NNWNNWNNW",
							"C" => "WNWNNWNNN",
							"D" => "NNNNWWNNW",
							"E" => "WNNNWWNNN",
							"F" => "NNWNWWNNN",
							"G" => "NNNNNWWNW",
							"H" => "WNNNNWWNN",
							"I" => "NNWNNWWNN",
							"J" => "NNNNWWWNN",
							"K" => "WNNNNNNWW",
							"L" => "NNWNNNNWW",
							"M" => "WNWNNNNWN",
							"N" => "NNNNWNNWW",
							"O" => "WNNNWNNWN",
							"P" => "NNWNWNNWN",
							"Q" => "NNNNNNWWW",
							"R" => "WNNNNNWWN",
							"S" => "NNWNNNWWN",
							"T" => "NNNNWNWWN",
							"U" => "WWNNNNNNW",
							"V" => "NWWNNNNNW",
							"W" => "WWWNNNNNN",
							"X" => "NWNNWNNNW",
							"Y" => "WWNNWNNNN",
							"Z" => "NWWNWNNNN",
							"-" => "NWNNNNWNW",
							"." => "WWNNNNWNN",
							" " => "NWWNNNWNN",
							"$" => "NWNWNWNNN",
							"/" => "NWNWNNNWN",
							"+" => "NWNNNWNWN",
							"%" => "NNNWNWNWN",
							"*" => "NWNNWNWNN"
							);

			$mfcStr="";
			$widebar=str_pad("",$this->_n2w,"1",STR_PAD_LEFT);
			$widespc=str_pad("",$this->_n2w,"0",STR_PAD_LEFT);
			
			if($checkdigit==true)
			{
				$arr_key=array_keys($encTable);
				for($i=0;$i<strlen($barnumber);$i++)
				{
					$num=$barnumber[$i];
					if(preg_match("/[A-Z]+/",$num))
						$num=ord($num)-55;
					elseif($num=='-')
						$num=36;
					elseif($num=='.')
						$num=37;
					elseif($num==' ')
						$num=38;
					elseif($num=='$')
						$num=39;
					elseif($num=='/')
						$num=40;
					elseif($num=='+')
						$num=41;
					elseif($num=='%')
						$num=42;
					elseif($num=='*')
						$num=43;
					$sum+=$num;	
				}	
				$barnumber.=trim($arr_key[(int)($sum % 43)]);
			}

			$barnumber="*".$barnumber."*";
			
			for($i=0;$i<strlen($barnumber);$i++)
			{
				$tmp=$encTable[$barnumber[$i]];

				$bar =true;
				
				for($j=0;$j<strlen($tmp);$j++)
				{
					if($tmp[$j]=='N' && $bar)
						$mfcStr.='1';
					else if($tmp[$j]=='N' && !$bar)
						$mfcStr.='0';
					else if($tmp[$j]=='W' && $bar)
						$mfcStr.=$widebar;
					else if($tmp[$j]=='W' && !$bar)
						$mfcStr.=$widespc;
					$bar = !$bar;
				}
				$mfcStr.='0';
			}
			
			return $mfcStr;
		}
				
		function _c39Barcode($barnumber,$scale=1,$file="",$checkdigit=false)
		{
						
			$bars=$this->_c39Encode($barnumber,$checkdigit);
			if(empty($file)){
				header("Content-type: image/".$this->_format);	
			}

			if ($scale<1) $scale=1;
			$total_y=(double)$scale * $this->_height+10*$scale;
			
			if (!isset($space))
			  $space=array('top'=>2*$scale,'bottom'=>1*$scale,'left'=>2*$scale,'right'=>2*$scale);
			
			/* count total width */
			$xpos=0;
			
			$xpos=$scale*strlen($bars)+2*$scale*10; 

			/* allocate the image */
			$total_x= $xpos +$space['left']+$space['right'];
			$xpos=$space['left']+$scale*10;
	
		    $height=floor($total_y-($scale*20));
		    //$height2=floor($total_y-$space['bottom']);
			$height2=floor($total_y-10);
			
			$im=@imagecreatetruecolor($total_x, $total_y);
			$bg_color = @imagecolorallocate($im, $this->_bgcolor[0], $this->_bgcolor[1],$this->_bgcolor[2]);
			@imagefilledrectangle($im,0,0,$total_x,$total_y,$bg_color); 
			$bar_color = @imagecolorallocate($im, $this->_color[0], $this->_color[1],$this->_color[2]);
	
			for($i=0;$i<strlen($bars);$i++)
			{
				$h=$height;
				$val=$bars[$i];

				if($val==1)
					@imagefilledrectangle($im,$xpos, $space['top'],$xpos+$scale-1, $h,$bar_color);
				$xpos+=$scale;
			}
			
			$font_arr=@imagettfbbox ( $scale*10, 0, $this->_font, $file);
			$x= floor($total_x-(int)$font_arr[0]-(int)$font_arr[2]+$scale*10)/2;	
			@imagettftext($im,$scale*10,0,$x-10, $height2, $bar_color,$this->_font , $file);

			
			if($this->_format=="png")
			{
				if(!empty($file))
					@imagepng($im,"codigos/barras/".$file.".".$this->_format);
				else
					@imagepng($im);
			}

			if($this->_format=="gif")
			{
				if(!empty($file)){
					@imagegif($im,"codigos/barras/".$file.".".$this->_format);
				}else
					@imagegif($im);
			}

			if($this->_format=="jpg" || $this->_format=="jpeg" )
			{
				if(!empty($file))
					@imagejpeg($im,"codigos/barras/".$file.".".$this->_format);
				else
					@imagejpeg($im);
			}

			@imagedestroy($im);
		}
		/// End functions for code39

	}
?>