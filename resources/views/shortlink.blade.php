<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gunung walat Park</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500&family=Saira:wght@800&display=swap"
        rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        body {
            height: 100vh;
            position: relative;
            display: flex;
            flex-direction: column;
        }

        h2 {
            font-family: 'Saira', sans-serif;
            font-weight: 600;
            text-transform: uppercase;
            color: white;
            text-shadow: 0 0 1px transparent, 0 1px 2px rgb(0 0 0 / 50%);
        }

        body >img {
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
        }

        section {
            display: grid;
            place-items: center;
            position: absolute;
            inset: 0;
            overflow-y: scroll;
        }
        
        section div {
            display: flex;
            flex-direction: column;
            gap: 10px;
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 10px;
            justify-content: center;
            align-items: center;
        }

        section > div {
            padding: 100px 10px;
        }

        section div img {
            width: 100px;
            aspect-ratio: 1;
            border-radius: 50%;
            box-shadow: 0 0 8px 1px lightblue;
        }

        a {
            display: flex;
            width: 100%;
            align-items: center;
            justify-content: center;
            border: 1.5px solid white;
            padding: 10px;
            color: white;
            text-decoration: none;
            gap: 20px;
            align-items: center;
            border-radius: 4px;
            transition-duration: 200ms;
        }

        a:hover {
            background: white;
            color: #0f172a;
        }

        a i {
            font-size: 1.3em;
        }

        select{
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            font-size: 1em;
            text-align: center;
            display: flex;
            width: 100%;
            align-items: center;
            justify-content: center;
            border: 1.5px solid white;
            padding: 10px;
            color: white;
            text-decoration: none;
            gap: 20px;
            align-items: center;
            border-radius: 4px;
            transition-duration: 200ms;
            background: transparent;
        }

        select:hover {
            background: white;
            color: #0f172a;
        }

    </style>
</head>

<script type="text/javascript">

function sentenceCase(str) {
    if ((str === null) || (str === ''))
        return false;
    else
        str = str.toString();
 
    return str.replace(/\w\S*/g,
        function (txt) {
            return txt.charAt(0).toUpperCase() +
                txt.substr(1).toLowerCase();
        });
}

function pilih_menu(val) {
  let text = "Buka halaman reservasi "+sentenceCase(val)+" ?";
    if(val != ''){
      if (confirm(text) == true) {
        window.open("/"+val);
      } else {
        text = "You canceled!";
        return false;
      }
    }else{
        return false;
    }
}    
</script>

<body>
    <img src="{!! asset('assets/images/double-place-2.jpg') !!}" alt="bg" />
    <section>
        <div>
            <img src="{!! asset('assets/images/logo gw.png') !!}" alt="dp" />
            <h2>Gunung walat Park</h2>
            <div>
                <a href="https://drive.google.com/file/d/1l2CLTmcWm5GjlBQYnw92m1mCWbTwDDkS/view">
                    <i class="fa-solid fa-clipboard"></i>
                    <p>Menu</p>
                </a>

                <label style="font-size: 1em; color: #fff;"><i class="fa-solid fa-book" style="font-size: 1.2em;"></i> &nbsp;&nbsp;&nbsp; Reservasi : </label>
                <select onchange="return pilih_menu(this.value);">
                    <option value="">-- Pilih --</option>
                    <option value="resto">Resto</option>
                    <option value="cafe">Cafe</option>
                    <option value="forest">Forest</option>
                </select>
                <a href="#" onclick="window.open('https://goo.gl/maps/uwgupn6prtjtvXLB8')">
                    <i class="fa-solid fa-location-dot"></i>
                    <p>Lokasi</p>
                </a>
                <a href="#" onclick="window.open('http://wa.me/6281359009200')">
                    <i class="fa-solid fa-phone"></i>
                    <p>Whatsapp</p>
                </a>
                <a href="#" onclick="window.open('/')">
                    <i class="fa-solid fa-globe"></i>
                    <p>Website</p>
                </a>
                <!-- <a href="">
                    <i class="fa-solid fa-box-archive"></i>
                    <p>Saran</p>
                </a> -->
            </div>
        </div>
    </section>
</body>

</html>