<?php
if (isset($_POST['submitDl']))
{
    header("Content-disposition:filename=Signature-VegaX");
    header("Content-type:application/octetstream");
    echo urldecode($_POST['signature']);
    exit(0);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;" />
    <meta charset="utf-8"/>
</head>
<body style="font-family: 'Myriad Pro', Helvetica, Arial, sans-serif; margin: 80px">
    <h1 style="font-weight: bold; color: black; font-size: 2rem"> Generate your VegaX signature</h1></br>
<p>
    <b>Please fill up all theses informations</b>
</p></br>
<p> <b style="color: #FFAF00">Your informations</b> </p>
<form  method="post">
    <label for="prenom">Name</label>
    <input name="prenom" id="prenom" type="text" value="<?php if(isset($_POST['prenom'])):echo $_POST['prenom'];  endif; ?>" /><br /><br />
    <label for="nom">Surname</label>
    <input name="nom" id="nom" type="text" value="<?php if(isset($_POST['nom'])): echo $_POST['nom']; endif; ?>" /><br /><br />
    <label for="poste">Position</label>
    <input name="poste" id="poste" type="text" value="<?php if(isset($_POST['poste'])): echo $_POST['poste']; endif; ?>" /><br /><br />
    <label for="email">Email</label>
    <input name="email" id="email" type="text" value="<?php if(isset($_POST['email'])): echo $_POST['email']; endif; ?>" /><br /><br />
    <label for="phone">Phone number (Please include the prefix of your country)</label>
    <input name="phone" id="phone" type="text" value="<?php if(isset($_POST['phone'])): echo $_POST['phone']; endif; ?>" /><br /><br />
    <label for="linkedin">Linkedin address</label>
    <input name="linkedin" id="linkedin" type="text" value="<?php if(isset($_POST['linkedin'])): echo $_POST['linkedin']; endif; ?>" /><br /><br />
    
    <label for="instagram">Instagram</label>
    <input name="instagram" id="instagram" type="text" value="<?php if(isset($_POST['instagram'])): echo $_POST['instagram']; endif; ?>" /><br /><br />

   
    <!--
    <label for="phonedirect">Ligne directe (format : "+33 (0)x xx xx xx xx")</label>
    <input name="phonedirect" id="phonedirect" type="text" value="<?php if(isset($_POST['phonedirect'])): echo $_POST['phone']; endif; ?>" /><br /><br />
    <label for="fax">Fax (format : "+33 (0)x xx xx xx xx")</label>
    <input name="fax" id="fax" type="text" value="<?php if(isset($_POST['fax'])): echo $_POST['fax']; endif; ?>" /><br /><br /> //-->
    <br><br>
    <input style="background-color: #5A6CEA; cursor: pointer; border-radius: 10px; border: none; height: 30px; width: 200px; color:white; font-weight: bold; margin: auto;" name="submit" type="submit" value="Submit"/></br></br>
    
    <p> New signature below:</p>
    <br>

    <?php
    if (isset($_POST['submit']))
    {
        //$contact = $_POST['email'];
        //$contact .= (!empty($_POST['phone']))?' | ':'';
        //$contact .= $_POST['phone'];
        $_POST['nom'] = ucfirst($_POST['nom']);
        $_POST['prenom'] = ucfirst($_POST['prenom']);
        $_POST['poste'] = ucwords($_POST['poste']);



        $htmlSig = <<<END
        <div style="font-size:12px;line-height:20px;letter-spacing: 0.05em; font-family:'Myriad Pro', Helvetica, Arial, 'sans-serif'">
	<span style="font-weight:600;">{$_POST['prenom']} {$_POST['nom']}</span>
		<br><span style="font-weight:100;font-size:12px;">{$_POST['poste']}</span>
	<br><br>
		</div>
<table>
	<tr>
	<td><img src="https://ci4.googleusercontent.com/proxy/Ij33xkkiZJpJ0_dUmVLLWeMUVm1n4t5GJAVNFhERd6DGwSQCF7ikFQuHuD15YUWHPFK9IEN7cUFliwnYpS1H3B8dtu2VR_qVJSDIBZIksQiEjP6iDGLSsORJFogRw2a3MAsc0lK0kFnJvl6yowrGy8Ih0IeCBelfJvJbsDC2cb9Js6rCOgMD8cgtmJqOAn8xZ9j1tQZ1tcC_htc5zA=s0-d-e1-ft#https://docs.google.com/uc?export=download&id=1nvhiMcqVXQCnnotIWyFp4uLHW-S7XO2b&revid=0B6SojzB47aM5QkZWbE5qWmtVT1V5TmoxeGEySjZyelRka2xBPQ" style="padding-right:30px;" width="90"></td>
	<td style="border-left: 1px solid #38C6F4;"></td>
		<td>
			<div style="margin-left:20px;font-weight:300;font-size:12px;line-height:20px;letter-spacing: 0.05em; font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, 'sans-serif'">{$_POST['phone']}<br>
            {$_POST['email']}<br>
				www.vegaxholdings.com
				<br><br>
			<a href="{$_POST['linkedin']}"><img src="https://i.imgur.com/2l2h5tU.png" width="20"></a>&nbsp;&nbsp;<a href="https://www.facebook.com/VegaXHoldings"><img src="https://i.imgur.com/aVqK5Iu.png" width="20"></a>&nbsp;&nbsp;<a href="{$_POST['instagram']}"><img src="https://i.imgur.com/G9gPiRN.png" width="20"></a>&nbsp;&nbsp;<a href="https://vegaxholdings.medium.com/"><img src="https://i.imgur.com/6qfxbfK.png" width="20"></a>
			</div>
		
			
		</td>
	</tr>
	
	</table>

END;
        echo $htmlSig;
        echo '<input name="signature" style="background:#5A6CEA;" type="hidden" value="'.urlencode($htmlSig).'"/>';
        echo '<input style="background-color: #FFAF00; cursor: pointer; border-radius: 10px; border: none; height: 30px; width: 200px; color:white; font-weight: bold; margin: auto;" name="submitDl" type="submit" value="Download HTML file"/>';
    }
    ?>
</form>
</body>
</html>
