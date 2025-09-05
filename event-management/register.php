<!doctypehtml>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta content="width=device-width,initial-scale=1" name="viewport">
        <title>Register For Akshadaa Event</title>
        <link href="assets/images/favicon.png" rel="shortcut icon" type="image/png">
        <link href="register.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"
            crossorigin="anonymous" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm">
    </head>
    <style>
    .navBar {
        height: 70px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #790556
    }

    @media screen and (max-width:400px) {
        .generalSetting {
            display: grid;
            width: 90%
        }

        .generalSettingOptionLabel {
            font-size: 25px;
            padding: 8px;
            width: 300px
        }

        .generalSettingOption {
            font-size: 20px;
            width: 300px;
            padding: 5px
        }

        .generalSettingOptionOut {
            width: 300px
        }

        .saveSetting {
            font-size: 25px
        }
    }

    @media screen and (min-width:721px) {
        .navImgOut {
            height: 80%;
            border-radius: 1vw;
            margin-left: 1vw;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: .2s
        }

        .navImgOut:hover {
            opacity: .85
        }

        .navImgOut:active {
            filter: blur(.1vw)
        }

        .navImg {
            height: 100%
        }
    }

    @media screen and (max-width:720px) {
        .navImgOut {
            height: 80%;
            border-radius: 3vw;
            margin-left: 2vw;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center
        }

        .navImg {
            height: 100%
        }
    }

    .rowForUploadImg {
        background: #fff;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
        visibility: hidden;
        position: fixed;
        top: 1vh;
        left: 1vw;
        z-index: 5;
        height: 0;
        width: 0;
        max-height: 98vh;
        overflow-y: scroll;
        border-radius: 1vw;
        box-shadow: .1vw .1vw .7vw rgb(0, 0, 0, .3)
    }

    #upload-demo {
        display: inline-block;
        margin-top: .5vw;
        position: relative;
        height: 555px
    }

    .uploadImgOpt {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        margin-bottom: .5vw;
        position: relative;
        padding: 5px
    }

    .uploadBoxBtns {
        color: #fff;
        outline: 0;
        border: .1vw solid transparent;
        padding: .5vw;
        font-size: 1.2vw;
        border-radius: .3vw
    }

    .uploadBoxBtns:hover {
        background: #fff;
        color: #000;
        border: .1vw solid #000
    }

    .uploadBoxBtns:active {
        filter: blur(.1vw)
    }

    .uploadImgBtn {
        background: #28a745
    }

    .closeUpload {
        margin: 10px 0
    }
    </style>

    <body style="background:#fff0f5">
        <?php $MERCHANT_KEY = "FAdIOw";
        $txnid = "Txn" . rand(10000, 99999999); ?>
        <div class="rowForUploadImg">
            <div style="position:relative" id="upload-demo"></div>
            <div class="uploadImgOpt"><strong>Select Image(Upload JPEG/JPG only):</strong><br><input id="biodata"
                    type="file" required><br><button class="btn btn-danger closeUpload" onclick="clickDetect()"
                    type="button">Save</button></div>
        </div>
        <div class="navBar">
            <div class="navImgOut" onclick='window.open("index.php",target="_top")'><img class="navImg"
                    src="assets/images/logo.png"></div>
            <div class="navImgOut" style="margin-right:2%"><img class="navImg" src="images/youthLogo.png"></div>
        </div>
        <div class="generalSetting settingOptionOut" id="firstSetting" method="post" target="frame">
            <div class="generalSettingOptionOut"><label class="generalSettingOptionLabel">First Name</label> <input
                    id="firstname" class="generalSettingOption generalSettingOptionP1 alphaClass generalSettingOption1"
                    placeholder="First Name" pattern="([^\s][A-z0-9À-ž\s]+)" name="firstname"></div>
            <div class="settingPartition"></div>
            <div class="generalSettingOptionOut"><label class="generalSettingOptionLabel">Middle Name</label> <input
                    id="middlename" class="generalSettingOption generalSettingOptionP1 alphaClass generalSettingOption2"
                    placeholder="Middle Name" pattern="([^\s][A-z0-9À-ž\s]+)"></div>
            <div class="detailTextOut"><label class="generalSettingOptionLabel">Last Name</label> <input id="lastname"
                    class="generalSettingOption generalSettingOptionP1 alphaClass detailText" placeholder="Last Name"
                    pattern="([^\s][A-z0-9À-ž\s]+)" name="lastname"></div>
            <div class="detailTextOut"><label class="generalSettingOptionLabel">Permanent Address</label> <input
                    id="address" class="generalSettingOption generalSettingOptionP1 detailText"
                    placeholder="Permanent Address" pattern="([^\s][A-z0-9À-ž\s]+)"></div>
            <div class="detailTextOut"><label class="generalSettingOptionLabel">Email ID</label> <input id="email"
                    class="generalSettingOption generalSettingOptionP1 detailText emailClass" placeholder="Email ID">
            </div>
            <div class="generalSettingOptionOut"><label class="generalSettingOptionLabel">Contact No.</label> <input
                    id="contactnumber"
                    class="generalSettingOption generalSettingOptionP1 generalSettingOption1 numberClass"
                    placeholder="Contact No." pattern="[6789][0-9]{9}"></div>
            <div class="settingPartition"></div>
            <div class="generalSettingOptionOut"><label class="generalSettingOptionLabel">WhatsApp No.</label> <input
                    id="whatsappnumber"
                    class="generalSettingOption generalSettingOptionP1 generalSettingOption2 numberClass"
                    placeholder="WhatsApp No." pattern="[6789][0-9]{9}" name="phone"></div>
            <div class="generalSettingOptionOut"><label class="generalSettingOptionLabel">Blood Group</label> <select
                    class="generalSettingOption generalSettingOptionP1 generalSettingOption7" id="bloodgorup">
                    <option value="" hidden selected>Blood Group</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select></div>
            <div class="settingPartition"></div>
            <div class="generalSettingOptionOut"><label class="generalSettingOptionLabel">Gender</label> <select
                    class="generalSettingOption generalSettingOptionP1 generalSettingOption7" id="gender" type="select">
                    <option value="" hidden selected>Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select></div>
            <div class="generalSettingOptionOut"><label class="generalSettingOptionLabel">First Gotram</label> <select
                    class="generalSettingOption generalSettingOptionP1 generalSettingOption7" id="firstGotram">
                    <option value="" hidden selected>First Gotram</option>
                    <option value='Aankul'>Aankul</option>
                    <option value='Abhimanchkul'>Abhimanchkul</option>
                    <option value='Abhimankul'>Abhimankul</option>
                    <option value='Abhimanyukul'>Abhimanyukul</option>
                    <option value='Akumanchal'>Akumanchal</option>
                    <option value='Anantkul'>Anantkul</option>
                    <option value='Ankul'>Ankul</option>
                    <option value='Antakul'>Antakul</option>
                    <option value='Ayankul'>Ayankul</option>
                    <option value='Balshishta'>Balshishta</option>
                    <option value='Balshatal'>Balshatal</option>
                    <option value='Bhanukul'>Bhanukul</option>
                    <option value='Bibshatla'>Bibshatla</option>
                    <option value='Bomadshatla'>Bomadshatla</option>
                    <option value='Budhankul'>Budhankul</option>
                    <option value='Chandkul'>Chandkul</option>
                    <option value='Chandrakul'>Chandrakul</option>
                    <option value='Chandrashil'>Chandrashil</option>
                    <option value='Chidrupkul'>Chidrupkul</option>
                    <option value='Chilkul'>Chilkul</option>
                    <option value='Chilshil'>Chilshil</option>
                    <option value='Chinnakul'>Chinnakul</option>
                    <option value='Chitrapil'>Chitrapil</option>
                    <option value='Chennakul'>Chennakul</option>
                    <option value='Channakul'>Channakul</option>
                    <option value='Deokul'>Deokul</option>
                    <option value='Deoshatla'>Deoshatla</option>
                    <option value='Deoshetti'>Deoshetti</option>
                    <option value='Devshishta'>Devshishta</option>
                    <option value='Deshatla'>Deshatla</option>
                    <option value='Dhankul'>Dhankul</option>
                    <option value='Dhanshil'>Dhanshil</option>
                    <option value='Dikshkul'>Dikshkul</option>
                    <option value='Ebhrashatla'>Ebhrashatla</option>
                    <option value='Ebishatla'>Ebishatla</option>
                    <option value='Ekshakul'>Ekshakul</option>
                    <option value='Enkol'>Enkol</option>
                    <option value='Enkul'>Enkul</option>
                    <option value='Ennakul'>Ennakul</option>
                    <option value='Eshashishta'>Eshashishta</option>
                    <option value='Eshpal'>Eshpal</option>
                    <option value='Eshwakul'>Eshwakul</option>
                    <option value='Gandheshwar'>Gandheshwar</option>
                    <option value='Ganshatla'>Ganshatla</option>
                    <option value='Gaurshatla'>Gaurshatla</option>
                    <option value='Gondakulla'>Gondakulla</option>
                    <option value='Gondkul'>Gondkul</option>
                    <option value='Gontakul'>Gontakul</option>
                    <option value='Gunai'>Gunai</option>
                    <option value='Gundkul'>Gundkul</option>
                    <option value='Guntkul'>Guntkul</option>
                    <option value='Gandheshil'>Gandheshil</option>
                    <option value='Janukul'>Janukul</option>
                    <option value='Jenchkul'>Jenchkul</option>
                    <option value='Khushal'>Khushal</option>
                    <option value='Komarshatla'>Komarshatla</option>
                    <option value='Kumshatla'>Kumshatla</option>
                    <option value='Madankul'>Madankul</option>
                    <option value='Malshet'>Malshet</option>
                    <option value='Mandkul'>Mandkul</option>
                    <option value='Mankul'>Mankul</option>
                    <option value='Masantkul'>Masantkul</option>
                    <option value='Minkul'>Minkul</option>
                    <option value='Mithunkul'>Mithunkul</option>
                    <option value='Molukul'>Molukul</option>
                    <option value='Moonkul'>Moonkul</option>
                    <option value='Morkul'>Morkul</option>
                    <option value='Mulkul'>Mulkul</option>
                    <option value='Munikul'>Munikul</option>
                    <option value='Murkul'>Murkul</option>
                    <option value='Munjikula'>Munjikula</option>
                    <option value='Nabhilkul'>Nabhilkul</option>
                    <option value='Nabhilla'>Nabhilla</option>
                    <option value='Narali'>Narali</option>
                    <option value='Navshil'>Navshil</option>
                    <option value='Pabhal'>Pabhal</option>
                    <option value='Prabhal'>Prabhal</option>
                    <option value='Padgeshil'>Padgeshil</option>
                    <option value='Padgeshwar'>Padgeshwar</option>
                    <option value='Padmashatla'>Padmashatla</option>
                    <option value='Padmashil'>Padmashil</option>
                    <option value='Padmashishta'>Padmashishta</option>
                    <option value='Pagadikul'>Pagadikul</option>
                    <option value='Paidikul'>Paidikul</option>
                    <option value='Paidkul'>Paidkul</option>
                    <option value='Paitkul'>Paitkul</option>
                    <option value='Panaskul'>Panaskul</option>
                    <option value='Panchkul'>Panchkul</option>
                    <option value='Panshil'>Panshil</option>
                    <option value='Pansul'>Pansul</option>
                    <option value='Parashar'>Parashar</option>
                    <option value='Paulshishta'>Paulshishta</option>
                    <option value='Pawanshil'>Pawanshil</option>
                    <option value='Pendakul'>Pendakul</option>
                    <option value='Pendalkul'>Pendalkul</option>
                    <option value='Pendlikul'>Pendlikul</option>
                    <option value='Penlikul'>Penlikul</option>
                    <option value='Pennakul'>Pennakul</option>
                    <option value='Polishatla'>Polishatla</option>
                    <option value='Polshatla'>Polshatla</option>
                    <option value='Pongeshil'>Pongeshil</option>
                    <option value='Puchhakul'>Puchhakul</option>
                    <option value='Pulashatla'>Pulashatla</option>
                    <option value='Pulkul'>Pulkul</option>
                    <option value='Pulshetal'>Pulshetal</option>
                    <option value='Punavshil'>Punavshil</option>
                    <option value='Pungeshil'>Pungeshil</option>
                    <option value='Pungwshwar'>Pungwshwar</option>
                    <option value='Punjashil'>Punjashil</option>
                    <option value='Punyashil'>Punyashil</option>
                    <option value='Punyeshwar'>Punyeshwar</option>
                    <option value='Pushpal'>Pushpal</option>
                    <option value='Perushatla'>Perushatla</option>
                    <option value='Parishatla'>Parishatla</option>
                    <option value='Punsakul'>Punsakul</option>
                    <option value='Rankul'>Rankul</option>
                    <option value='Rantkul'>Rantkul</option>
                    <option value='Rentkul'>Rentkul</option>
                    <option value='Runtakul'>Runtakul</option>
                    <option value='Renukul'>Renukul</option>
                    <option value='Rontakul'>Rontakul</option>
                    <option value='Sankul'>Sankul</option>
                    <option value='Senshatla'>Senshatla</option>
                    <option value='Shaigol'>Shaigol</option>
                    <option value='Shaivgol'>Shaivgol</option>
                    <option value='Shankul'>Shankul</option>
                    <option value='Shayankul'>Shayankul</option>
                    <option value='Sheelkul'>Sheelkul</option>
                    <option value='Shirsal'>Shirsal</option>
                    <option value='Shirshatla'>Shirshatla</option>
                    <option value='Shrinikul'>Shrinikul</option>
                    <option value='Shrishal'>Shrishal</option>
                    <option value='Shrishatla'>Shrishatla</option>
                    <option value='Shrisheel'>Shrisheel</option>
                    <option value='Shrishishta'>Shrishishta</option>
                    <option value='Shrishreshta'>Shrishreshta</option>
                    <option value='Sirsal'>Sirsal</option>
                    <option value='Sirshatla'>Sirshatla</option>
                    <option value='Sudarshan'>Sudarshan</option>
                    <option value='Surkul'>Surkul</option>
                    <option value='Sursal'>Sursal</option>
                    <option value='Suryakul'>Suryakul</option>
                    <option value='Susal'>Susal</option>
                    <option value='Totkul'>Totkul</option>
                    <option value='Tulshishta'>Tulshishta</option>
                    <option value='Tulshitla'>Tulshitla</option>
                    <option value='Tulashatla'>Tulashatla</option>
                    <option value='Upankul'>Upankul</option>
                    <option value='Utkul'>Utkul</option>
                    <option value='Utkalkul'>Utkalkul</option>
                    <option value='Vachhakul'>Vachhakul</option>
                    <option value='Vastrakul'>Vastrakul</option>
                    <option value='Vatsakul'>Vatsakul</option>
                    <option value='Vinukul'>Vinukul</option>
                    <option value='Viparishatla'>Viparishatla</option>
                    <option value='Viparishishta'>Viparishishta</option>
                    <option value='Viprashatla'>Viprashatla</option>
                    <option value='Vishnukul'>Vishnukul</option>
                    <option value='Vishwakul'>Vishwakul</option>
                    <option value='Vishwapal'>Vishwapal</option>
                    <option value='Vikramshishta'>Vikramshishta</option>
                    <option value='Vikramshil'>Vikramshil</option>
                    <option value='Yalkul'>Yalkul</option>
                    <option value='Yalshat'>Yalshat</option>
                    <option value='Yalshatla'>Yalshatla</option>
                    <option value='Yalshatti'>Yalshatti</option>
                    <option value='Yalshishta'>Yalshishta</option>
                    <option value='Yankul'>Yankul</option>
                    <option value='Yannukul'>Yannukul</option>
                    <option value='Yenkul'>Yenkul</option>
                    <option value='Yetakul'>Yetakul</option>
                </select></div>
            <div class="settingPartition"></div>
            <div class="generalSettingOptionOut"><label class="generalSettingOptionLabel">Second Gotram</label> <select
                    class="generalSettingOption generalSettingOptionP1 generalSettingOption7" id="secondGotram"
                    type="select">
                    <option value="" hidden selected>Second Gotram</option>
                    <option value='Aankul'>Aankul</option>
                    <option value='Abhimanchkul'>Abhimanchkul</option>
                    <option value='Abhimankul'>Abhimankul</option>
                    <option value='Abhimanyukul'>Abhimanyukul</option>
                    <option value='Akumanchal'>Akumanchal</option>
                    <option value='Anantkul'>Anantkul</option>
                    <option value='Ankul'>Ankul</option>
                    <option value='Antakul'>Antakul</option>
                    <option value='Ayankul'>Ayankul</option>
                    <option value='Balshishta'>Balshishta</option>
                    <option value='Balshatal'>Balshatal</option>
                    <option value='Bhanukul'>Bhanukul</option>
                    <option value='Bibshatla'>Bibshatla</option>
                    <option value='Bomadshatla'>Bomadshatla</option>
                    <option value='Budhankul'>Budhankul</option>
                    <option value='Chandkul'>Chandkul</option>
                    <option value='Chandrakul'>Chandrakul</option>
                    <option value='Chandrashil'>Chandrashil</option>
                    <option value='Chidrupkul'>Chidrupkul</option>
                    <option value='Chilkul'>Chilkul</option>
                    <option value='Chilshil'>Chilshil</option>
                    <option value='Chinnakul'>Chinnakul</option>
                    <option value='Chitrapil'>Chitrapil</option>
                    <option value='Chennakul'>Chennakul</option>
                    <option value='Channakul'>Channakul</option>
                    <option value='Deokul'>Deokul</option>
                    <option value='Deoshatla'>Deoshatla</option>
                    <option value='Deoshetti'>Deoshetti</option>
                    <option value='Devshishta'>Devshishta</option>
                    <option value='Deshatla'>Deshatla</option>
                    <option value='Dhankul'>Dhankul</option>
                    <option value='Dhanshil'>Dhanshil</option>
                    <option value='Dikshkul'>Dikshkul</option>
                    <option value='Ebhrashatla'>Ebhrashatla</option>
                    <option value='Ebishatla'>Ebishatla</option>
                    <option value='Ekshakul'>Ekshakul</option>
                    <option value='Enkol'>Enkol</option>
                    <option value='Enkul'>Enkul</option>
                    <option value='Ennakul'>Ennakul</option>
                    <option value='Eshashishta'>Eshashishta</option>
                    <option value='Eshpal'>Eshpal</option>
                    <option value='Eshwakul'>Eshwakul</option>
                    <option value='Gandheshwar'>Gandheshwar</option>
                    <option value='Ganshatla'>Ganshatla</option>
                    <option value='Gaurshatla'>Gaurshatla</option>
                    <option value='Gondakulla'>Gondakulla</option>
                    <option value='Gondkul'>Gondkul</option>
                    <option value='Gontakul'>Gontakul</option>
                    <option value='Gunai'>Gunai</option>
                    <option value='Gundkul'>Gundkul</option>
                    <option value='Guntkul'>Guntkul</option>
                    <option value='Gandheshil'>Gandheshil</option>
                    <option value='Janukul'>Janukul</option>
                    <option value='Jenchkul'>Jenchkul</option>
                    <option value='Khushal'>Khushal</option>
                    <option value='Komarshatla'>Komarshatla</option>
                    <option value='Kumshatla'>Kumshatla</option>
                    <option value='Madankul'>Madankul</option>
                    <option value='Malshet'>Malshet</option>
                    <option value='Mandkul'>Mandkul</option>
                    <option value='Mankul'>Mankul</option>
                    <option value='Masantkul'>Masantkul</option>
                    <option value='Minkul'>Minkul</option>
                    <option value='Mithunkul'>Mithunkul</option>
                    <option value='Molukul'>Molukul</option>
                    <option value='Moonkul'>Moonkul</option>
                    <option value='Morkul'>Morkul</option>
                    <option value='Mulkul'>Mulkul</option>
                    <option value='Munikul'>Munikul</option>
                    <option value='Murkul'>Murkul</option>
                    <option value='Munjikula'>Munjikula</option>
                    <option value='Nabhilkul'>Nabhilkul</option>
                    <option value='Nabhilla'>Nabhilla</option>
                    <option value='Narali'>Narali</option>
                    <option value='Navshil'>Navshil</option>
                    <option value='Pabhal'>Pabhal</option>
                    <option value='Prabhal'>Prabhal</option>
                    <option value='Padgeshil'>Padgeshil</option>
                    <option value='Padgeshwar'>Padgeshwar</option>
                    <option value='Padmashatla'>Padmashatla</option>
                    <option value='Padmashil'>Padmashil</option>
                    <option value='Padmashishta'>Padmashishta</option>
                    <option value='Pagadikul'>Pagadikul</option>
                    <option value='Paidikul'>Paidikul</option>
                    <option value='Paidkul'>Paidkul</option>
                    <option value='Paitkul'>Paitkul</option>
                    <option value='Panaskul'>Panaskul</option>
                    <option value='Panchkul'>Panchkul</option>
                    <option value='Panshil'>Panshil</option>
                    <option value='Pansul'>Pansul</option>
                    <option value='Parashar'>Parashar</option>
                    <option value='Paulshishta'>Paulshishta</option>
                    <option value='Pawanshil'>Pawanshil</option>
                    <option value='Pendakul'>Pendakul</option>
                    <option value='Pendalkul'>Pendalkul</option>
                    <option value='Pendlikul'>Pendlikul</option>
                    <option value='Penlikul'>Penlikul</option>
                    <option value='Pennakul'>Pennakul</option>
                    <option value='Polishatla'>Polishatla</option>
                    <option value='Polshatla'>Polshatla</option>
                    <option value='Pongeshil'>Pongeshil</option>
                    <option value='Puchhakul'>Puchhakul</option>
                    <option value='Pulashatla'>Pulashatla</option>
                    <option value='Pulkul'>Pulkul</option>
                    <option value='Pulshetal'>Pulshetal</option>
                    <option value='Punavshil'>Punavshil</option>
                    <option value='Pungeshil'>Pungeshil</option>
                    <option value='Pungwshwar'>Pungwshwar</option>
                    <option value='Punjashil'>Punjashil</option>
                    <option value='Punyashil'>Punyashil</option>
                    <option value='Punyeshwar'>Punyeshwar</option>
                    <option value='Pushpal'>Pushpal</option>
                    <option value='Perushatla'>Perushatla</option>
                    <option value='Parishatla'>Parishatla</option>
                    <option value='Punsakul'>Punsakul</option>
                    <option value='Rankul'>Rankul</option>
                    <option value='Rantkul'>Rantkul</option>
                    <option value='Rentkul'>Rentkul</option>
                    <option value='Runtakul'>Runtakul</option>
                    <option value='Renukul'>Renukul</option>
                    <option value='Rontakul'>Rontakul</option>
                    <option value='Sankul'>Sankul</option>
                    <option value='Senshatla'>Senshatla</option>
                    <option value='Shaigol'>Shaigol</option>
                    <option value='Shaivgol'>Shaivgol</option>
                    <option value='Shankul'>Shankul</option>
                    <option value='Shayankul'>Shayankul</option>
                    <option value='Sheelkul'>Sheelkul</option>
                    <option value='Shirsal'>Shirsal</option>
                    <option value='Shirshatla'>Shirshatla</option>
                    <option value='Shrinikul'>Shrinikul</option>
                    <option value='Shrishal'>Shrishal</option>
                    <option value='Shrishatla'>Shrishatla</option>
                    <option value='Shrisheel'>Shrisheel</option>
                    <option value='Shrishishta'>Shrishishta</option>
                    <option value='Shrishreshta'>Shrishreshta</option>
                    <option value='Sirsal'>Sirsal</option>
                    <option value='Sirshatla'>Sirshatla</option>
                    <option value='Sudarshan'>Sudarshan</option>
                    <option value='Surkul'>Surkul</option>
                    <option value='Sursal'>Sursal</option>
                    <option value='Suryakul'>Suryakul</option>
                    <option value='Susal'>Susal</option>
                    <option value='Totkul'>Totkul</option>
                    <option value='Tulshishta'>Tulshishta</option>
                    <option value='Tulshitla'>Tulshitla</option>
                    <option value='Tulashatla'>Tulashatla</option>
                    <option value='Upankul'>Upankul</option>
                    <option value='Utkul'>Utkul</option>
                    <option value='Utkalkul'>Utkalkul</option>
                    <option value='Vachhakul'>Vachhakul</option>
                    <option value='Vastrakul'>Vastrakul</option>
                    <option value='Vatsakul'>Vatsakul</option>
                    <option value='Vinukul'>Vinukul</option>
                    <option value='Viparishatla'>Viparishatla</option>
                    <option value='Viparishishta'>Viparishishta</option>
                    <option value='Viprashatla'>Viprashatla</option>
                    <option value='Vishnukul'>Vishnukul</option>
                    <option value='Vishwakul'>Vishwakul</option>
                    <option value='Vishwapal'>Vishwapal</option>
                    <option value='Vikramshishta'>Vikramshishta</option>
                    <option value='Vikramshil'>Vikramshil</option>
                    <option value='Yalkul'>Yalkul</option>
                    <option value='Yalshat'>Yalshat</option>
                    <option value='Yalshatla'>Yalshatla</option>
                    <option value='Yalshatti'>Yalshatti</option>
                    <option value='Yalshishta'>Yalshishta</option>
                    <option value='Yankul'>Yankul</option>
                    <option value='Yannukul'>Yannukul</option>
                    <option value='Yenkul'>Yenkul</option>
                    <option value='Yetakul'>Yetakul</option>
                </select></div>
            <div class="generalSettingOptionOut"><label class="generalSettingOptionLabel">Birth Name</label> <input
                    id="birthname" class="generalSettingOption generalSettingOptionP1 alphaClass generalSettingOption6"
                    placeholder="Birth Name" pattern="([^\s][A-z0-9À-ž\s]+)"></div>
            <div class="settingPartition"></div>
            <div class="generalSettingOptionOut"><label class="generalSettingOptionLabel">Birth Day (mm/dd/yyyy)</label>
                <input id="dob" class="generalSettingOption generalSettingOptionP1 generalSettingOption8" type="date">
            </div>
            <div class="generalSettingOptionOut"><label class="generalSettingOptionLabel">Education</label> <input
                    id="education" class="generalSettingOption generalSettingOptionP1 alphaClass generalSettingOption1"
                    placeholder="Education" pattern="([^\s][A-z0-9À-ž\s]+)"></div>
            <div class="settingPartition"></div>
            <div class="generalSettingOptionOut"><label class="generalSettingOptionLabel">Profession</label> <input
                    id="profession" class="generalSettingOption generalSettingOptionP1 alphaClass generalSettingOption2"
                    placeholder="Profession" pattern="([^\s][A-z0-9À-ž\s]+)"></div>
            <div class="generalSettingOptionOut"><label class="generalSettingOptionLabel">Partner's Expected
                    Education</label> <input id="partnerEdu"
                    class="generalSettingOption generalSettingOptionP1 alphaClass generalSettingOption1"
                    placeholder="Partner's Expected Education" pattern="([^\s][A-z0-9À-ž\s]+)"></div>
            <div class="settingPartition"></div>
            <div class="generalSettingOptionOut"><label class="generalSettingOptionLabel">Partner's Expected
                    Profession</label> <input id="partnerProf"
                    class="generalSettingOption generalSettingOptionP1 alphaClass generalSettingOption2"
                    placeholder="Partner's Expected Profession" pattern="([^\s][A-z0-9À-ž\s]+)"></div><button
                class="uploadType saveSetting" id="nextSetting">Next <b>→</b></button>
        </div>
        <div class="generalSetting settingOptionOut" id="secondSetting" method="post" target="frame"
            style="justify-content:center;align-items:center">
            <?php
            require_once "connect.php";
            $paymentMethod = "SELECT `payment_method` FROM `admin` WHERE `id` = '11111'";
            $mehtodrun = mysqli_query($conn, $paymentMethod);
            $row21 = mysqli_fetch_assoc($mehtodrun);
            $result = $row21['payment_method'];
            $action = "";
            if ($result == "txn") {
                $action = "scan.php";
            } else if ($result == "payU") {
                $action = "eventPay.php";
            } else {
                $action = "./PaytmKit/TxnTest.php";
            }
            ?>
            <form action=<?php echo $action ?> class="generalSetting settingOptionOut" id="eventPayForm" method="post"
                name="eventPayForm">
                <div class="generalSettingOptionOut" style="justify-content:flex-start"><button class="saveSetting"
                        onclick="openFirstSetting()"><b>←</b> Back</button></div>
                <div class="settingPartition"></div>
                <div class="generalSettingOptionOut"><button class="saveSetting uploadImgOpenBtn"
                        onclick="clickDetect()" type="button">Upload Profile Photo</button></div>
                <div class="generalSettingOptionOut"><label class="generalSettingOptionLabel">Candidate Vaccination
                        Details:</label></div>
                <div class="settingPartition"></div>
                <div class="generalSettingOptionOut"><label class="generalSettingOptionLabel">No. of Doses Done</label>
                    <select class="generalSettingOption generalSettingOption7 vacNoValidate" id="candidateNVD"
                        type="select" required>
                        <option value="" hidden selected>No. of Doses Done</option>
                        <!-- <option value="1">1st Dose Done</option> -->
                        <option value="2">2nd Dose Done</option>
                    </select>
                </div>
                <div class="uploadTypeOut"><label class="generalSettingOptionLabel">Vaccination Certificate</label>
                    <input id="candidateVacCer" class="generalSettingOption uploadType vacCerValidate" type="file"
                        required>
                </div>
                <div class="generalSettingOptionOut detailTextOut" style="margin-top:2vw"><label
                        class="generalSettingOptionLabel">No. of non parent attendees</label> <select
                        class="generalSettingOption detailText generalSettingOption7 vacNoValidate" id="NoParent"
                        type="select" required>
                        <option value="" hidden selected>No. of non parent attendees</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select></div>
                <div class="generalSettingOptionOut" id="firstPTitle"><label
                        class="generalSettingOptionLabel">1<sup>st</sup> Parent/Relative Details:</label></div>
                <div class="detailTextOut" id="firstPName"><label class="generalSettingOptionLabel">Name</label> <input
                        id="fParentName" class="generalSettingOption detailText alphaClassP2" placeholder="Name"
                        pattern="([^\s][A-z0-9À-ž\s]+)"></div>
                <div class="generalSettingOptionOut" id="firstPDose"><label class="generalSettingOptionLabel">No. of
                        Doses Done</label> <select class="generalSettingOption generalSettingOption7 vacNoValidate"
                        id="fParentNVD" type="select">
                        <option value="" hidden selected>No. of Doses Done</option>
                        <!-- <option value="1">1st Dose Done</option> -->
                        <option value="2">2nd Dose Done</option>
                    </select></div>
                <div class="uploadTypeOut" id="firstPVCer"><label class="generalSettingOptionLabel">Vaccination
                        Certificate</label> <input id="fParentVacCer"
                        class="generalSettingOption uploadType vacCerValidate" type="file"></div>
                <div class="generalSettingOptionOut" id="secondPTitle"><label
                        class="generalSettingOptionLabel">2<sup>nd</sup> Parent/Relative Details:</label></div>
                <div class="detailTextOut" id="secondPName"><label class="generalSettingOptionLabel">Name</label> <input
                        id="sParentName" class="generalSettingOption detailText alphaClassP2" placeholder="Name"
                        pattern="([^\s][A-z0-9À-ž\s]+)"></div>
                <div class="generalSettingOptionOut" id="secondPDose"><label class="generalSettingOptionLabel">No. of
                        Doses Done</label> <select class="generalSettingOption generalSettingOption7 vacNoValidate"
                        id="sParentNVD" type="select">
                        <option value="" hidden selected>No. of Doses Done</option>
                        <!-- <option value="1">1st Dose Done</option> -->
                        <option value="2">2nd Dose Done</option>
                    </select></div>
                <div class="uploadTypeOut" id="secondPVCer"><label class="generalSettingOptionLabel">Vaccination
                        Certificate</label> <input id="sParentVacCer"
                        class="generalSettingOption uploadType vacCerValidate" type="file"></div>
                <div class="generalSettingOptionOut" class="displayNoneC" id="thirdPTitle"><label
                        class="generalSettingOptionLabel">3<sup>rd</sup> Parent/Relative Details:</label></div>
                <div class="detailTextOut" class="displayNone" id="thirdPName"><label
                        class="generalSettingOptionLabel">Name</label> <input id="tParentName"
                        class="generalSettingOption detailText alphaClassP2" placeholder="Name"
                        pattern="([^\s][A-z0-9À-ž\s]+)"></div>
                <div class="generalSettingOptionOut" class="displayNoneC" id="thirdPDose"><label
                        class="generalSettingOptionLabel">No. of Doses Done</label> <select
                        class="generalSettingOption generalSettingOption7 vacNoValidate" id="tParentNVD" type="select">
                        <option value="" hidden selected>No. of Doses Done</option>
                        <!-- <option value="1">1st Dose Done</option> -->
                        <option value="2">2nd Dose Done</option>
                    </select></div>
                <div class="uploadTypeOut" class="displayNoneC" id="thirdPVCer"><label
                        class="generalSettingOptionLabel">Vaccination Certificate</label> <input id="tParentVacCer"
                        class="generalSettingOption uploadType vacCerValidate" type="file"></div>
                <div class="generalSettingOptionOut" class="displayNoneC" id="forthPTitle"><label
                        class="generalSettingOptionLabel">4<sup>th</sup> Parent/Relative Details:</label></div>
                <div class="detailTextOut" class="displayNoneC" id="forthPName"><label
                        class="generalSettingOptionLabel">Name</label> <input id="foParentName"
                        class="generalSettingOption detailText alphaClassP2" placeholder="Name"
                        pattern="([^\s][A-z0-9À-ž\s]+)"></div>
                <div class="generalSettingOptionOut" class="displayNoneC" id="forthPDose"><label
                        class="generalSettingOptionLabel">No. of Doses Done</label> <select
                        class="generalSettingOption generalSettingOption7 vacNoValidate" id="foParentNVD" type="select">
                        <option value="" hidden selected>No. of Doses Done</option>
                        <!-- <option value="1">1st Dose Done</option> -->
                        <option value="2">2nd Dose Done</option>
                    </select></div>
                <div class="uploadTypeOut" id="forthPVCer"><label class="generalSettingOptionLabel">Vaccination
                        Certificate</label> <input id="foParentVacCer"
                        class="generalSettingOption uploadType vacCerValidate" type="file"></div>
                <div class="detailTextOut"><label class="generalSettingOptionLabel">Total Amount (candidate +
                        parents)</label>
                    <input id="candidateAmount" class="generalSettingOption detailText" readonly value="6650">
                </div>
                <div class="detailTextOut"><label class="generalSettingOptionLabel">Total Parent/Relative Amount</label>
                    <input id="parentAmount" class="generalSettingOption detailText" readonly value="0">
                </div>
                <div class="detailTextOut"
                    style="display:flex;flex-direction:row;justify-content:flex-start;align-items:center;width:300px">
                    <div style="margin-right:.5vw"><input id="termCheck" type="checkbox" required></div>
                    <div class="generalSettingOptionLabel1" style="color:#047bfc;font-size:20px">I agree to the terms of
                        service</div>
                </div>
                <input id="productinfo" type="hidden" name="productinfo" value="Akshadaa Event Registration">
                <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY; ?>">
                <input id="PayEmail" type="hidden" name="email" value="test@gmail.com">
                <input id="PayAddress" type="hidden" name="address" value="address">
                <input id="surl" type="hidden" name="surl" value="https://event.akshadaa.com/Paysuccess.php">
                <input id="furl" type="hidden" name="furl" value="https://event.akshadaa.com/Payfail.php">
                <input id="PayPhone" type="hidden" name="phone" value="9876543210">
                <input id="PayLastname" type="hidden" name="lastname" value="Lastname">
                <input id="PayFirstname" type="hidden" name="firstname" value="Firstname">
                <input type="hidden" name="service_provider" value="payu_paisa" size="64">
                <input type="hidden" name="txnid" value="<?php echo $txnid; ?>">
                <input id="amount" type="hidden" name="amount" value="6650">
                <button class="saveSetting" type="button" id="clickPaySetting" style="width:42vw"><span>Pay ₹
                        6650</span></button>
            </form>
        </div>
        <script>
        var alphaExp = /^[a-zA-Z\s\S]+$/;
        var mobileExp = /[6789][0-9]{9}/;
        var emailExp = /^\S+@\S+\.\S+$/;
        $(".generalSettingOptionP1").focusout(function() {
            if ($(this).val().trim() == "") {
                $(this).css("border", "1px solid red");
            } else {
                $(this).css("border", "1px solid #7D3668");
            }
        });

        $(".alphaClass").focusout(function() {
            if (!$(this).val().match(alphaExp)) {
                $(this).css("border", "1px solid red");
            } else {
                $(this).css("border", "1px solid #7D3668");
            }
        });

        $(".emailClass").focusout(function() {
            if (!$(this).val().match(emailExp)) {
                $(this).css("border", "1px solid red");
            } else {
                $(this).css("border", "1px solid #7D3668");
            }
        });

        $(".numberClass").focusout(function() {
            if (!($(this).val().match(mobileExp)) || !(6000000000 <= $(this).val() <= 9999999999)) {
                $(this).css("border", "1px solid red");
            } else {
                $(this).css("border", "1px solid #7D3668");
            }
        });

        $(".alphaClassP2").focusout(function() {
            if (!$(this).val().match(alphaExp) || $(this).val() == '') {
                $(this).css("border", "1px solid red");
            } else {
                $(this).css("border", "1px solid #7D3668");
            }
        });

        $(".vacNoValidate").focusout(function() {
            if ($(this).val() == '') {
                $(this).css("border", "1px solid red");
            } else {
                $(this).css("border", "1px solid #7D3668");
            }
        });

        $(".vacCerValidate").focusout(function() {
            if ($(this).val() == '') {
                $(this).css("border", "1px solid red");
            } else {
                $(this).css("border", "none");
            }
        });

        var clickDetectVal;
        let rowForUploadImg = document.getElementsByClassName("rowForUploadImg");

        function clickDetect() {
            clickDetectVal = 1;
            console.log("clickDetectVal " + clickDetectVal);
            console.log("Style: " + rowForUploadImg[0].style.visibility);
            if (rowForUploadImg[0].style.visibility == "hidden" || rowForUploadImg[0].style.visibility == "") {
                rowForUploadImg[0].style.visibility = "visible";
                rowForUploadImg[0].style.width = "98vw";
                rowForUploadImg[0].style.height = "98vh";
            } else {
                rowForUploadImg[0].style.width = "0vw";
                rowForUploadImg[0].style.width = "0vw";
                rowForUploadImg[0].style.visibility = "hidden";
            }
        }
        </script>
        <script type="text/javascript">
        var fileExt = "";
        $uploadCrop = $("#upload-demo").croppie({
            enableExif: !0,
            viewport: {
                width: 300,
                height: 300,
                type: "square"
            },
            boundary: {
                width: 320,
                height: 320
            }
        }), $("#biodata").on("change", function() {
            var e = new FileReader;
            e.onload = function(e) {
                var t = $("#biodata").val();
                fileExt = t.substr(t.lastIndexOf(".") + 1, t.length), $uploadCrop.croppie("bind", {
                    url: e.target.result
                }).then(function() {
                    console.log("jQuery bind complete")
                })
            }, e.readAsDataURL(this.files[0])
        })
        </script>
        <script>
        // var AkshadaaID = $("#AkshadaaID").val();
        var firstname = $("#firstname").val();
        var middlename = $("#middlename").val();
        var lastname = $("#lastname").val();
        var address = $("#address").val();
        var email = $("#email").val();
        var contactnumber = $("#contactnumber").val();
        var whatsappnumber = $("#whatsappnumber").val();
        var bloodgorup = $("#bloodgorup").val();
        var gender = $("#gender").val();
        var firstGotram = $("#firstGotram").val();
        var secondGotram = $("#secondGotram").val();
        var birthname = $("#birthname").val();
        var dob = $("#dob").val();
        var education = $("#education").val();
        var profession = $("#profession").val();
        var partnerEdu = $("#partnerEdu").val();
        var partnerProf = $("#partnerProf").val();

        var amount = $('#amount').val();

        var candidateNVD = $("#candidateNVD").val();
        var NoParent = $("#NoParent").val();
        var fParentName = $("#fParentName").val();
        var fParentNVD = $("#fParentNVD").val();
        var sParentName = $("#sParentName").val();
        var sParentNVD = $("#sParentNVD").val();
        var tParentName = $("#tParentName").val();
        var tParentNVD = $("#tParentNVD").val();
        var foParentName = $("#foParentName").val();
        var foParentNVD = $("#foParentNVD").val();

        var biodata = "";
        var fParentVacCer = "";
        var sParentVacCer = "";
        var tParentVacCer = "";
        var foParentVacCer = "";
        var candidateVacCer = "";
        var candidateAmount = "";
        var parentAmount = "";
        var eventPayForm = $('#eventPayForm');

        function openFirstSetting() {
            $("#firstSetting").css("display", "flex");
            $("#secondSetting").css("display", "none");
        }
        $(document).ready(function() {
            $(document).on('change', '#NoParent', function() {
                // swal("Select Changed");
                NoParent = $("#NoParent").val();
                // $("#education").val();
                if (NoParent == 0) {
                    $("#firstPTitle").css("display", "none");
                    $("#firstPName").css("display", "none");
                    $("#firstPDose").css("display", "none");
                    $("#firstPVCer").css("display", "none");
                    $("#secondPTitle").css("display", "none");
                    $("#secondPName").css("display", "none");
                    $("#secondPDose").css("display", "none");
                    $("#secondPVCer").css("display", "none");

                    $("#thirdPTitle").css("display", "none");
                    $("#thirdPName").css("display", "none");
                    $("#thirdPDose").css("display", "none");
                    $("#thirdPVCer").css("display", "none");
                    $("#forthPTitle").css("display", "none");
                    $("#forthPName").css("display", "none");
                    $("#forthPDose").css("display", "none");
                    $("#forthPVCer").css("display", "none");
                    $("#parentAmount").val("0");
                    $("#clickPaySetting span").html("Pay &#x20B9; 6650");
                    $("#amount").val("6650");
                    $("#candidateAmount").val("6650");
                    $("#PayFirstname").val(firstname);
                    $("#PayLastname").val(lastname);
                    $("#PayPhone").val(whatsappnumber);
                    $("#PayEmail").val(email);
                    $("#PayAddress").val(address);
                } else if (NoParent == 1) {
                    $("#firstPTitle").css("display", "inline-Block");
                    $("#firstPName").css("display", "inline-Block");
                    $("#firstPDose").css("display", "inline-Block");
                    $("#firstPVCer").css("display", "inline-Block");
                    $("#secondPTitle").css("display", "none");
                    $("#secondPName").css("display", "none");
                    $("#secondPDose").css("display", "none");
                    $("#secondPVCer").css("display", "none");

                    $("#thirdPTitle").css("display", "none");
                    $("#thirdPName").css("display", "none");
                    $("#thirdPDose").css("display", "none");
                    $("#thirdPVCer").css("display", "none");
                    $("#forthPTitle").css("display", "none");
                    $("#forthPName").css("display", "none");
                    $("#forthPDose").css("display", "none");
                    $("#forthPVCer").css("display", "none");
                    $("#parentAmount").val("2100");
                    $("#clickPaySetting span").html("Pay &#x20B9; 8750");
                    $("#amount").val("8750");
                    $("#candidateAmount").val("8750");
                    $("#PayFirstname").val(firstname);
                    $("#PayLastname").val(lastname);
                    $("#PayPhone").val(whatsappnumber);
                    $("#PayEmail").val(email);
                    $("#PayAddress").val(address);
                } else if (NoParent == 2) {
                    $("#firstPTitle").css("display", "inline-Block");
                    $("#firstPName").css("display", "inline-Block");
                    $("#firstPDose").css("display", "inline-Block");
                    $("#firstPVCer").css("display", "inline-Block");
                    $("#secondPTitle").css("display", "inline-Block");
                    $("#secondPName").css("display", "inline-Block");
                    $("#secondPDose").css("display", "inline-Block");
                    $("#secondPVCer").css("display", "inline-Block");
                    $("#amount").val("10850");
                    $("#candidateAmount").val("10850");
                    $("#thirdPTitle").css("display", "none");
                    $("#thirdPName").css("display", "none");
                    $("#thirdPDose").css("display", "none");
                    $("#thirdPVCer").css("display", "none");
                    $("#forthPTitle").css("display", "none");
                    $("#forthPName").css("display", "none");
                    $("#forthPDose").css("display", "none");
                    $("#forthPVCer").css("display", "none");
                    $("#parentAmount").val("4200");
                    $("#clickPaySetting span").html("Pay &#x20B9; 10850");
                } else if (NoParent == 3) {
                    $("#firstPTitle").css("display", "inline-Block");
                    $("#firstPName").css("display", "inline-Block");
                    $("#firstPDose").css("display", "inline-Block");
                    $("#firstPVCer").css("display", "inline-Block");
                    $("#secondPTitle").css("display", "inline-Block");
                    $("#secondPName").css("display", "inline-Block");
                    $("#secondPDose").css("display", "inline-Block");
                    $("#secondPVCer").css("display", "inline-Block");
                    $("#amount").val("12950");
                    $("#candidateAmount").val("12950");
                    $("#thirdPTitle").css("display", "inline-Block");
                    $("#thirdPName").css("display", "inline-Block");
                    $("#thirdPDose").css("display", "inline-Block");
                    $("#thirdPVCer").css("display", "inline-Block");
                    $("#forthPTitle").css("display", "none");
                    $("#forthPName").css("display", "none");
                    $("#forthPDose").css("display", "none");
                    $("#forthPVCer").css("display", "none");
                    $("#parentAmount").val("6300");
                    $("#clickPaySetting span").html("Pay &#x20B9; 12950");
                } else if (NoParent == 4) {
                    $("#firstPTitle").css("display", "inline-Block");
                    $("#firstPName").css("display", "inline-Block");
                    $("#firstPDose").css("display", "inline-Block");
                    $("#firstPVCer").css("display", "inline-Block");
                    $("#secondPTitle").css("display", "inline-Block");
                    $("#secondPName").css("display", "inline-Block");
                    $("#secondPDose").css("display", "inline-Block");
                    $("#secondPVCer").css("display", "inline-Block");
                    $("#amount").val("15050");
                    $("#candidateAmount").val("15050");
                    $("#thirdPTitle").css("display", "inline-Block");
                    $("#thirdPName").css("display", "inline-Block");
                    $("#thirdPDose").css("display", "inline-Block");
                    $("#thirdPVCer").css("display", "inline-Block");
                    $("#forthPTitle").css("display", "inline-Block");
                    $("#forthPName").css("display", "inline-Block");
                    $("#forthPDose").css("display", "inline-Block");
                    $("#forthPVCer").css("display", "inline-Block");
                    $("#parentAmount").val("8400");
                    $("#clickPaySetting span").html("Pay &#x20B9; 15050");
                    $("#amount").val("15050");
                    $("#PayFirstname").val(firstname);
                    $("#PayLastname").val(lastname);
                    $("#PayPhone").val(whatsappnumber);
                    $("#PayEmail").val(email);
                    $("#PayAddress").val(address);
                }
            });
            $("#nextSetting").click(function(e) {
                // e.preventDefault();
                // console.log("Val1 : " + $("#radioInput1").val());
                // console.log("Val2 : " + $("#radioInput2").val());
                // AkshadaaID = $("#AkshadaaID").val();
                firstname = $("#firstname").val();
                middlename = $("#middlename").val();
                lastname = $("#lastname").val();
                address = $("#address").val();
                email = $("#email").val();
                contactnumber = $("#contactnumber").val();
                whatsappnumber = $("#whatsappnumber").val();
                bloodgorup = $("#bloodgorup").val();
                gender = $("#gender").val();
                firstGotram = $("#firstGotram").val();
                secondGotram = $("#secondGotram").val();
                birthname = $("#birthname").val();
                dob = $("#dob").val();
                education = $("#education").val();
                profession = $("#profession").val();
                partnerEdu = $("#partnerEdu").val();
                partnerProf = $("#partnerProf").val();
                $("#PayFirstname").val(firstname);
                $("#PayLastname").val(lastname);
                $("#PayPhone").val(whatsappnumber);
                $("#PayEmail").val(email);
                $("#PayAddress").val(address);
                // console.log("Val : " + $("#radioInput").val());

                // var alphaExp = /^[a-zA-Z]+$/;
                // var mobileExp = /[6789][0-9]{9}/;
                // var emailExp = /^\S+@\S+\.\S+$/;

                // var emailExp =  /^[a-zA-Z]+$/;

                if (firstGotram.trim() != "" && secondGotram.trim() != "" && firstname.match(
                        alphaExp) && firstname.trim() != "" && middlename.match(alphaExp) && middlename
                    .trim() != "" && lastname.match(alphaExp) && lastname.trim() != "" && address
                    .trim() != "" && email.trim() != "" && email.match(emailExp) && contactnumber.match(
                        mobileExp) && 6000000000 <= contactnumber <= 9999999999 && contactnumber
                    .trim() != "" && whatsappnumber.match(mobileExp) && 6000000000 <= whatsappnumber <=
                    9999999999 && whatsappnumber.trim() != "" && bloodgorup.trim() != "" && gender
                    .trim() != "" && birthname.match(alphaExp) && birthname.trim() != "" && dob
                    .trim() != "" && education.match(alphaExp) && education.trim() != "" && profession
                    .match(alphaExp) && profession.trim() != "" && partnerEdu.match(alphaExp) &&
                    partnerEdu.trim() != "" && partnerProf.match(alphaExp) && partnerProf.trim() != ""
                ) {
                    $("#firstSetting").css("display", "none");
                    $("#secondSetting").css("display", "flex");
                } else {
                    $(".generalSettingOptionP1").each(function() {
                        if ($(this).val().trim() == "") {
                            $(this).css("border", "1px solid red");
                        } else {
                            $(this).css("border", "1px solid #7D3668");
                        }
                    });

                    $(".alphaClass").each(function() {
                        if (!$(this).val().match(alphaExp)) {
                            $(this).css("border", "1px solid red");
                        } else {
                            $(this).css("border", "1px solid #7D3668");
                        }
                    });

                    $(".emailClass").each(function() {
                        if (!$(this).val().match(emailExp)) {
                            $(this).css("border", "1px solid red");
                        } else {
                            $(this).css("border", "1px solid #7D3668");
                        }
                    });

                    $(".numberClass").each(function() {
                        if (!($(this).val().match(mobileExp)) || !(6000000000 <= $(this)
                                .val() <= 9999999999)) {
                            $(this).css("border", "1px solid red");
                        } else {
                            $(this).css("border", "1px solid #7D3668");
                        }
                    });
                    swal("Kindly Fill Valid Details In Red Bordered Fields!");
                    //   //   // console.log(fname + " " + lname + " " + c_country + " " + mobile + " " + gender + " " + dob);
                }
            });

            $("#clickPaySetting").click(function(e) {
                candidateNVD = $("#candidateNVD").val();
                NoParent = $("#NoParent").val();
                fParentName = $("#fParentName").val();
                fParentNVD = $("#fParentNVD").val();
                sParentName = $("#sParentName").val();
                sParentNVD = $("#sParentNVD").val();
                tParentName = $("#tParentName").val();
                tParentNVD = $("#tParentNVD").val();
                foParentName = $("#foParentName").val();
                foParentNVD = $("#foParentNVD").val();
                $("#PayFirstname").val(firstname);
                $("#PayLastname").val(lastname);
                $("#PayPhone").val(whatsappnumber);
                $("#PayEmail").val(email);
                $("#PayAddress").val(address);
                if (candidateNVD.trim() != "" && NoParent.trim() != "" && $("#biodata").val() != "" &&
                    $("#candidateVacCer").val() != "" && $("#termCheck").prop('checked') == true) {
                    // swal("File: " + $("#termCheck").val());
                    if (NoParent == "0") {
                        let subSt = 1;
                        setInterval(() => {
                            if (subSt) {
                                subSt = 0;
                                swal('Redirecting For Payment, Please Wait...');
                                subSt = 1;
                            }
                        }, 100);
                        candidateAmount = "6650";
                        parentAmount = "0";
                        // var fd = new FormData();
                        // var files;
                        // var viewWidthForImgUpload = window.matchMedia("(max-width: 720px)");
                        // if (viewWidthForImgUpload.matches) {
                        //   files = $('#biodata')[0].files;
                        // } else {
                        //   files = $('#biodata')[0].files;
                        // }
                        // fd.append('file', files[0]);
                        // $.ajax({
                        //   url: "helper/biodataUpload.php",
                        //   type: "POST",
                        //   data: fd,
                        //   contentType: false,
                        //   processData: false,
                        $uploadCrop.croppie('result', {
                            type: 'canvas',
                            size: 'viewport'
                        }).then(function(resp) {
                            $.ajax({
                                url: "helper/biodataUpload.php",
                                type: "POST",
                                data: {
                                    "image": resp,
                                    "fileExt": fileExt
                                },
                                success: function(responseBio) {
                                    if (responseBio != "0") {
                                        // swal(responseBio);
                                        biodata = responseBio;
                                        var fd = new FormData();
                                        var files;
                                        var viewWidthForImgUpload = window
                                            .matchMedia("(max-width: 720px)");
                                        if (viewWidthForImgUpload.matches) {
                                            files = $('#candidateVacCer')[0].files;
                                        } else {
                                            files = $('#candidateVacCer')[0].files;
                                        }
                                        fd.append('file', files[0]);
                                        $.ajax({
                                            url: "helper/candidateVacCer.php",
                                            type: "POST",
                                            data: fd,
                                            contentType: false,
                                            processData: false,
                                            success: function(
                                                responseCanVacCer) {
                                                if (responseCanVacCer !=
                                                    "0") {
                                                    candidateVacCer =
                                                        responseCanVacCer;
                                                    $.ajax({
                                                        type: 'post',
                                                        url: 'helper/registerForEvent.php',
                                                        data: {
                                                            // AkshadaaID: AkshadaaID,
                                                            firstname: firstname,
                                                            middlename: middlename,
                                                            lastname: lastname,
                                                            address: address,
                                                            email: email,
                                                            contactnumber: contactnumber,
                                                            whatsappnumber: whatsappnumber,
                                                            bloodgorup: bloodgorup,
                                                            gender: gender,
                                                            firstGotram: firstGotram,
                                                            secondGotram: secondGotram,
                                                            birthname: birthname,
                                                            dob: dob,
                                                            education: education,
                                                            profession: profession,
                                                            partnerEdu: partnerEdu,
                                                            partnerProf: partnerProf,
                                                            candidateNVD: candidateNVD,
                                                            NoParent: NoParent,
                                                            fParentName: fParentName,
                                                            fParentNVD: fParentNVD,
                                                            sParentName: sParentName,
                                                            sParentNVD: sParentNVD,
                                                            tParentName: tParentName,
                                                            tParentNVD: tParentNVD,
                                                            foParentName: foParentName,
                                                            foParentNVD: foParentNVD,
                                                            biodata: biodata,
                                                            fParentVacCer: fParentVacCer,
                                                            sParentVacCer: sParentVacCer,
                                                            tParentVacCer: tParentVacCer,
                                                            foParentVacCer: foParentVacCer,
                                                            candidateVacCer: candidateVacCer,
                                                            candidateAmount: candidateAmount,
                                                            parentAmount: parentAmount
                                                        },
                                                        success: function(
                                                            response
                                                        ) {
                                                            eventPayForm
                                                                .submit();
                                                            // swal("Registration Done Successfully!");
                                                            // location.reload();
                                                            // swal("Biodata: " + response);
                                                            // console.log("Biodata: " + biodata);
                                                            // adminPanelPartLoad('ADMIN_OUR_STORIES');
                                                        }
                                                    });

                                                } else {
                                                    swal(
                                                        'An Error Occured! Please Try Again!'
                                                    );
                                                }
                                            }
                                        });
                                    } else {
                                        swal('An Error Occured! Please Try Again!');
                                    }
                                }
                            });
                        });
                        // candidateAmount = "6650";
                        // parentAmount = "0";
                    } else if (NoParent == "1") {
                        if (fParentName.trim() != "" && fParentNVD.trim() != "" && $("#fParentVacCer")
                            .val() != "") {
                            let subSt = 1;
                            setInterval(() => {
                                if (subSt) {
                                    subSt = 0;
                                    swal('Redirecting For Payment, Please Wait...');
                                    subSt = 1;
                                }
                            }, 100);
                            candidateAmount = "8750";
                            parentAmount = "2100";
                            // var fd = new FormData();
                            // var files;
                            // var viewWidthForImgUpload = window.matchMedia("(max-width: 720px)");
                            // if (viewWidthForImgUpload.matches) {
                            //   files = $('#biodata')[0].files;
                            // } else {
                            //   files = $('#biodata')[0].files;
                            // }
                            // fd.append('file', files[0]);
                            // $.ajax({
                            //   url: "helper/biodataUpload.php",
                            //   type: "POST",
                            //   data: fd,
                            //   contentType: false,
                            //   processData: false,
                            $uploadCrop.croppie('result', {
                                type: 'canvas',
                                size: 'viewport'
                            }).then(function(resp) {
                                $.ajax({
                                    url: "helper/biodataUpload.php",
                                    type: "POST",
                                    data: {
                                        "image": resp,
                                        "fileExt": fileExt
                                    },
                                    success: function(responseBio) {
                                        if (responseBio != "0") {
                                            // swal(responseBio);
                                            biodata = responseBio;
                                            var fd = new FormData();
                                            var files;
                                            var viewWidthForImgUpload = window
                                                .matchMedia("(max-width: 720px)");
                                            if (viewWidthForImgUpload.matches) {
                                                files = $('#candidateVacCer')[0]
                                                    .files;
                                            } else {
                                                files = $('#candidateVacCer')[0]
                                                    .files;
                                            }
                                            fd.append('file', files[0]);
                                            $.ajax({
                                                url: "helper/candidateVacCer.php",
                                                type: "POST",
                                                data: fd,
                                                contentType: false,
                                                processData: false,
                                                success: function(
                                                    responseCanVacCer) {
                                                    if (responseCanVacCer !=
                                                        "0") {
                                                        candidateVacCer
                                                            =
                                                            responseCanVacCer;
                                                        var fd =
                                                            new FormData();
                                                        var files;
                                                        var viewWidthForImgUpload =
                                                            window
                                                            .matchMedia(
                                                                "(max-width: 720px)"
                                                            );
                                                        if (viewWidthForImgUpload
                                                            .matches) {
                                                            files = $(
                                                                    '#fParentVacCer'
                                                                )[0]
                                                                .files;
                                                        } else {
                                                            files = $(
                                                                    '#fParentVacCer'
                                                                )[0]
                                                                .files;
                                                        }
                                                        fd.append(
                                                            'file',
                                                            files[0]
                                                        );
                                                        $.ajax({
                                                            url: "helper/fParentVacCer.php",
                                                            type: "POST",
                                                            data: fd,
                                                            contentType: false,
                                                            processData: false,
                                                            success: function(
                                                                responseFParentVacCer
                                                            ) {
                                                                if (responseFParentVacCer !=
                                                                    "0"
                                                                ) {
                                                                    fParentVacCer
                                                                        =
                                                                        responseFParentVacCer;
                                                                    $.ajax({
                                                                        type: 'post',
                                                                        url: 'helper/registerForEvent.php',
                                                                        data: {
                                                                            // AkshadaaID: AkshadaaID,
                                                                            firstname: firstname,
                                                                            middlename: middlename,
                                                                            lastname: lastname,
                                                                            address: address,
                                                                            email: email,
                                                                            contactnumber: contactnumber,
                                                                            whatsappnumber: whatsappnumber,
                                                                            bloodgorup: bloodgorup,
                                                                            gender: gender,
                                                                            firstGotram: firstGotram,
                                                                            secondGotram: secondGotram,
                                                                            birthname: birthname,
                                                                            dob: dob,
                                                                            education: education,
                                                                            profession: profession,
                                                                            partnerEdu: partnerEdu,
                                                                            partnerProf: partnerProf,
                                                                            candidateNVD: candidateNVD,
                                                                            NoParent: NoParent,
                                                                            fParentName: fParentName,
                                                                            fParentNVD: fParentNVD,
                                                                            sParentName: sParentName,
                                                                            sParentNVD: sParentNVD,
                                                                            tParentName: tParentName,
                                                                            tParentNVD: tParentNVD,
                                                                            foParentName: foParentName,
                                                                            foParentNVD: foParentNVD,
                                                                            biodata: biodata,
                                                                            fParentVacCer: fParentVacCer,
                                                                            sParentVacCer: sParentVacCer,
                                                                            tParentVacCer: tParentVacCer,
                                                                            foParentVacCer: foParentVacCer,
                                                                            candidateVacCer: candidateVacCer,
                                                                            candidateAmount: candidateAmount,
                                                                            parentAmount: parentAmount
                                                                        },
                                                                        success: function(
                                                                            response
                                                                        ) {
                                                                            eventPayForm
                                                                                .submit();
                                                                            // swal("Registration Done Successfully!");
                                                                            // location.reload();
                                                                            // swal("Biodata: " + response);
                                                                            // console.log("Biodata: " + biodata);
                                                                            // adminPanelPartLoad('ADMIN_OUR_STORIES');
                                                                        }
                                                                    });

                                                                } else {
                                                                    swal(
                                                                        'An Error Occured! Please Try Again!'
                                                                    );
                                                                }
                                                            }
                                                        });
                                                    } else {
                                                        swal(
                                                            'An Error Occured! Please Try Again!'
                                                        );
                                                    }
                                                }
                                            });
                                        } else {
                                            swal(
                                                'An Error Occured! Please Try Again!'
                                            );
                                        }
                                    }
                                });
                            });
                            // candidateAmount = "6650";
                            // parentAmount = "2100";
                        } else {
                            if ($("#biodata").val() == '') {
                                swal('Please Upload Your Profile Photo!');
                            } else {
                                $(".alphaClassP2").each(function() {
                                    if (!$(this).val().match(alphaExp) || $(this).val() == '') {
                                        $(this).css("border", "1px solid red");
                                    } else {
                                        $(this).css("border", "1px solid #7D3668");
                                    }
                                });

                                $(".vacNoValidate").each(function() {
                                    if ($(this).val() == '') {
                                        $(this).css("border", "1px solid red");
                                    } else {
                                        $(this).css("border", "1px solid #7D3668");
                                    }
                                });

                                $(".vacCerValidate").each(function() {
                                    if ($(this).val() == '') {
                                        $(this).css("border", "1px solid red");
                                    } else {
                                        $(this).css("border", "none");
                                    }
                                });
                                swal("Kindly Fill Valid Details In Red Bordered Fields!");
                            }
                        }
                    } else if (NoParent == "2") {
                        if (fParentName.trim() != "" && fParentNVD.trim() != "" && sParentName.trim() !=
                            "" && sParentNVD.trim() != "" && $("#fParentVacCer").val() != "" && $(
                                "#sParentVacCer").val() != "") {
                            let subSt = 1;
                            setInterval(() => {
                                if (subSt) {
                                    subSt = 0;
                                    swal('Redirecting For Payment, Please Wait...');
                                    subSt = 1;
                                }
                            }, 100);
                            candidateAmount = "10850";
                            parentAmount = "4200";
                            // var fd = new FormData();
                            // var files;
                            // var viewWidthForImgUpload = window.matchMedia("(max-width: 720px)");
                            // if (viewWidthForImgUpload.matches) {
                            //   files = $('#biodata')[0].files;
                            // } else {
                            //   files = $('#biodata')[0].files;
                            // }
                            // fd.append('file', files[0]);
                            // $.ajax({
                            //   url: "helper/biodataUpload.php",
                            //   type: "POST",
                            //   data: fd,
                            //   contentType: false,
                            //   processData: false,
                            $uploadCrop.croppie('result', {
                                type: 'canvas',
                                size: 'viewport'
                            }).then(function(resp) {
                                $.ajax({
                                    url: "helper/biodataUpload.php",
                                    type: "POST",
                                    data: {
                                        "image": resp,
                                        "fileExt": fileExt
                                    },
                                    success: function(responseBio) {
                                        if (responseBio != "0") {
                                            // swal(responseBio);
                                            biodata = responseBio;
                                            var fd = new FormData();
                                            var files;
                                            var viewWidthForImgUpload = window
                                                .matchMedia("(max-width: 720px)");
                                            if (viewWidthForImgUpload.matches) {
                                                files = $('#candidateVacCer')[0]
                                                    .files;
                                            } else {
                                                files = $('#candidateVacCer')[0]
                                                    .files;
                                            }
                                            fd.append('file', files[0]);
                                            $.ajax({
                                                url: "helper/candidateVacCer.php",
                                                type: "POST",
                                                data: fd,
                                                contentType: false,
                                                processData: false,
                                                success: function(
                                                    responseCanVacCer) {
                                                    if (responseCanVacCer !=
                                                        "0") {
                                                        candidateVacCer
                                                            =
                                                            responseCanVacCer;
                                                        var fd =
                                                            new FormData();
                                                        var files;
                                                        var viewWidthForImgUpload =
                                                            window
                                                            .matchMedia(
                                                                "(max-width: 720px)"
                                                            );
                                                        if (viewWidthForImgUpload
                                                            .matches) {
                                                            files = $(
                                                                    '#fParentVacCer'
                                                                )[0]
                                                                .files;
                                                        } else {
                                                            files = $(
                                                                    '#fParentVacCer'
                                                                )[0]
                                                                .files;
                                                        }
                                                        fd.append(
                                                            'file',
                                                            files[0]
                                                        );
                                                        $.ajax({
                                                            url: "helper/fParentVacCer.php",
                                                            type: "POST",
                                                            data: fd,
                                                            contentType: false,
                                                            processData: false,
                                                            success: function(
                                                                responseFParentVacCer
                                                            ) {
                                                                if (responseFParentVacCer !=
                                                                    "0"
                                                                ) {
                                                                    fParentVacCer
                                                                        =
                                                                        responseFParentVacCer;
                                                                    var fd =
                                                                        new FormData();
                                                                    var
                                                                        files;
                                                                    var viewWidthForImgUpload =
                                                                        window
                                                                        .matchMedia(
                                                                            "(max-width: 720px)"
                                                                        );
                                                                    if (viewWidthForImgUpload
                                                                        .matches
                                                                    ) {
                                                                        files
                                                                            =
                                                                            $(
                                                                                '#sParentVacCer'
                                                                            )[
                                                                                0
                                                                            ]
                                                                            .files;
                                                                    } else {
                                                                        files
                                                                            =
                                                                            $(
                                                                                '#sParentVacCer'
                                                                            )[
                                                                                0
                                                                            ]
                                                                            .files;
                                                                    }
                                                                    fd.append(
                                                                        'file',
                                                                        files[
                                                                            0
                                                                        ]
                                                                    );
                                                                    $.ajax({
                                                                        url: "helper/sParentVacCer.php",
                                                                        type: "POST",
                                                                        data: fd,
                                                                        contentType: false,
                                                                        processData: false,
                                                                        success: function(
                                                                            responseSParentVacCer
                                                                        ) {
                                                                            if (responseSParentVacCer !=
                                                                                "0"
                                                                            ) {
                                                                                sParentVacCer
                                                                                    =
                                                                                    responseSParentVacCer;
                                                                                $.ajax({
                                                                                    type: 'post',
                                                                                    url: 'helper/registerForEvent.php',
                                                                                    data: {
                                                                                        // AkshadaaID: AkshadaaID,
                                                                                        firstname: firstname,
                                                                                        middlename: middlename,
                                                                                        lastname: lastname,
                                                                                        address: address,
                                                                                        email: email,
                                                                                        contactnumber: contactnumber,
                                                                                        whatsappnumber: whatsappnumber,
                                                                                        bloodgorup: bloodgorup,
                                                                                        gender: gender,
                                                                                        firstGotram: firstGotram,
                                                                                        secondGotram: secondGotram,
                                                                                        birthname: birthname,
                                                                                        dob: dob,
                                                                                        education: education,
                                                                                        profession: profession,
                                                                                        partnerEdu: partnerEdu,
                                                                                        partnerProf: partnerProf,
                                                                                        candidateNVD: candidateNVD,
                                                                                        NoParent: NoParent,
                                                                                        fParentName: fParentName,
                                                                                        fParentNVD: fParentNVD,
                                                                                        sParentName: sParentName,
                                                                                        sParentNVD: sParentNVD,
                                                                                        tParentName: tParentName,
                                                                                        tParentNVD: tParentNVD,
                                                                                        foParentName: foParentName,
                                                                                        foParentNVD: foParentNVD,
                                                                                        biodata: biodata,
                                                                                        fParentVacCer: fParentVacCer,
                                                                                        sParentVacCer: sParentVacCer,
                                                                                        tParentVacCer: tParentVacCer,
                                                                                        foParentVacCer: foParentVacCer,
                                                                                        candidateVacCer: candidateVacCer,
                                                                                        candidateAmount: candidateAmount,
                                                                                        parentAmount: parentAmount
                                                                                    },
                                                                                    success: function(
                                                                                        response
                                                                                    ) {
                                                                                        // swal("Biodata: " + response);
                                                                                        // console.log("Biodata: " + biodata);
                                                                                        eventPayForm
                                                                                            .submit();
                                                                                        // swal("Registration Done Successfully!");
                                                                                        // location.reload();
                                                                                        // adminPanelPartLoad('ADMIN_OUR_STORIES');
                                                                                    }
                                                                                });

                                                                            } else {
                                                                                swal(
                                                                                    'An Error Occured! Please Try Again!'
                                                                                );
                                                                            }
                                                                        }
                                                                    });
                                                                } else {
                                                                    swal(
                                                                        'An Error Occured! Please Try Again!'
                                                                    );
                                                                }
                                                            }
                                                        });
                                                    } else {
                                                        swal(
                                                            'An Error Occured! Please Try Again!'
                                                        );
                                                    }
                                                }
                                            });
                                        } else {
                                            swal(
                                                'An Error Occured! Please Try Again!'
                                            );
                                        }
                                    }
                                });
                            });
                        } else {
                            if ($("#biodata").val() == '') {
                                swal('Please Upload Your Profile Photo!');
                            } else {
                                $(".alphaClassP2").each(function() {
                                    if (!$(this).val().match(alphaExp) || $(this).val() == '') {
                                        $(this).css("border", "1px solid red");
                                    } else {
                                        $(this).css("border", "1px solid #7D3668");
                                    }
                                });

                                $(".vacNoValidate").each(function() {
                                    if ($(this).val() == '') {
                                        $(this).css("border", "1px solid red");
                                    } else {
                                        $(this).css("border", "1px solid #7D3668");
                                    }
                                });

                                $(".vacCerValidate").each(function() {
                                    if ($(this).val() == '') {
                                        $(this).css("border", "1px solid red");
                                    } else {
                                        $(this).css("border", "none");
                                    }
                                });
                                swal("Kindly Fill Valid Details In Red Bordered Fields!");
                            }
                        }
                        // candidateAmount = "6650";
                        // parentAmount = "3600";
                    } else if (NoParent == "3") {
                        if (fParentName.trim() != "" && fParentNVD.trim() != "" && sParentName.trim() !=
                            "" && sParentNVD.trim() != "" && tParentName.trim() != "" && tParentNVD
                            .trim() != "" && $("#fParentVacCer").val() != "" && $("#sParentVacCer")
                            .val() != "" && $("#tParentVacCer").val() != "") {
                            let subSt = 1;
                            setInterval(() => {
                                if (subSt) {
                                    subSt = 0;
                                    swal('Redirecting For Payment, Please Wait...');
                                    subSt = 1;
                                }
                            }, 100);
                            candidateAmount = "12950";
                            parentAmount = "6300";
                            // var fd = new FormData();
                            // var files;
                            // var viewWidthForImgUpload = window.matchMedia("(max-width: 720px)");
                            // if (viewWidthForImgUpload.matches) {
                            //   files = $('#biodata')[0].files;
                            // } else {
                            //   files = $('#biodata')[0].files;
                            // }
                            // fd.append('file', files[0]);
                            // $.ajax({
                            //   url: "helper/biodataUpload.php",
                            //   type: "POST",
                            //   data: fd,
                            //   contentType: false,
                            //   processData: false,
                            $uploadCrop.croppie('result', {
                                type: 'canvas',
                                size: 'viewport'
                            }).then(function(resp) {
                                $.ajax({
                                    url: "helper/biodataUpload.php",
                                    type: "POST",
                                    data: {
                                        "image": resp,
                                        "fileExt": fileExt
                                    },
                                    success: function(responseBio) {
                                        if (responseBio != "0") {
                                            // swal(responseBio);
                                            biodata = responseBio;
                                            var fd = new FormData();
                                            var files;
                                            var viewWidthForImgUpload = window
                                                .matchMedia("(max-width: 720px)");
                                            if (viewWidthForImgUpload.matches) {
                                                files = $('#candidateVacCer')[0]
                                                    .files;
                                            } else {
                                                files = $('#candidateVacCer')[0]
                                                    .files;
                                            }
                                            fd.append('file', files[0]);
                                            $.ajax({
                                                url: "helper/candidateVacCer.php",
                                                type: "POST",
                                                data: fd,
                                                contentType: false,
                                                processData: false,
                                                success: function(
                                                    responseCanVacCer) {
                                                    if (responseCanVacCer !=
                                                        "0") {
                                                        candidateVacCer
                                                            =
                                                            responseCanVacCer;
                                                        var fd =
                                                            new FormData();
                                                        var files;
                                                        var viewWidthForImgUpload =
                                                            window
                                                            .matchMedia(
                                                                "(max-width: 720px)"
                                                            );
                                                        if (viewWidthForImgUpload
                                                            .matches) {
                                                            files = $(
                                                                    '#fParentVacCer'
                                                                )[0]
                                                                .files;
                                                        } else {
                                                            files = $(
                                                                    '#fParentVacCer'
                                                                )[0]
                                                                .files;
                                                        }
                                                        fd.append(
                                                            'file',
                                                            files[0]
                                                        );
                                                        $.ajax({
                                                            url: "helper/fParentVacCer.php",
                                                            type: "POST",
                                                            data: fd,
                                                            contentType: false,
                                                            processData: false,
                                                            success: function(
                                                                responseFParentVacCer
                                                            ) {
                                                                if (responseFParentVacCer !=
                                                                    "0"
                                                                ) {
                                                                    fParentVacCer
                                                                        =
                                                                        responseFParentVacCer;
                                                                    var fd =
                                                                        new FormData();
                                                                    var
                                                                        files;
                                                                    var viewWidthForImgUpload =
                                                                        window
                                                                        .matchMedia(
                                                                            "(max-width: 720px)"
                                                                        );
                                                                    if (viewWidthForImgUpload
                                                                        .matches
                                                                    ) {
                                                                        files
                                                                            =
                                                                            $(
                                                                                '#sParentVacCer'
                                                                            )[
                                                                                0
                                                                            ]
                                                                            .files;
                                                                    } else {
                                                                        files
                                                                            =
                                                                            $(
                                                                                '#sParentVacCer'
                                                                            )[
                                                                                0
                                                                            ]
                                                                            .files;
                                                                    }
                                                                    fd.append(
                                                                        'file',
                                                                        files[
                                                                            0
                                                                        ]
                                                                    );
                                                                    $.ajax({
                                                                        url: "helper/sParentVacCer.php",
                                                                        type: "POST",
                                                                        data: fd,
                                                                        contentType: false,
                                                                        processData: false,
                                                                        success: function(
                                                                            responseSParentVacCer
                                                                        ) {
                                                                            if (responseSParentVacCer !=
                                                                                "0"
                                                                            ) {
                                                                                sParentVacCer
                                                                                    =
                                                                                    responseSParentVacCer;
                                                                                var fd =
                                                                                    new FormData();
                                                                                var
                                                                                    files;
                                                                                var viewWidthForImgUpload =
                                                                                    window
                                                                                    .matchMedia(
                                                                                        "(max-width: 720px)"
                                                                                    );
                                                                                if (viewWidthForImgUpload
                                                                                    .matches
                                                                                ) {
                                                                                    files
                                                                                        =
                                                                                        $(
                                                                                            '#tParentVacCer'
                                                                                        )[
                                                                                            0
                                                                                        ]
                                                                                        .files;
                                                                                } else {
                                                                                    files
                                                                                        =
                                                                                        $(
                                                                                            '#tParentVacCer'
                                                                                        )[
                                                                                            0
                                                                                        ]
                                                                                        .files;
                                                                                }
                                                                                fd.append(
                                                                                    'file',
                                                                                    files[
                                                                                        0
                                                                                    ]
                                                                                );
                                                                                $.ajax({
                                                                                    url: "helper/tParentVacCer.php",
                                                                                    type: "POST",
                                                                                    data: fd,
                                                                                    contentType: false,
                                                                                    processData: false,
                                                                                    success: function(
                                                                                        responseTParentVacCer
                                                                                    ) {
                                                                                        if (responseTParentVacCer !=
                                                                                            "0"
                                                                                        ) {
                                                                                            tParentVacCer
                                                                                                =
                                                                                                responseTParentVacCer;
                                                                                            $.ajax({
                                                                                                type: 'post',
                                                                                                url: 'helper/registerForEvent.php',
                                                                                                data: {
                                                                                                    // AkshadaaID: AkshadaaID,
                                                                                                    firstname: firstname,
                                                                                                    middlename: middlename,
                                                                                                    lastname: lastname,
                                                                                                    address: address,
                                                                                                    email: email,
                                                                                                    contactnumber: contactnumber,
                                                                                                    whatsappnumber: whatsappnumber,
                                                                                                    bloodgorup: bloodgorup,
                                                                                                    gender: gender,
                                                                                                    firstGotram: firstGotram,
                                                                                                    secondGotram: secondGotram,
                                                                                                    birthname: birthname,
                                                                                                    dob: dob,
                                                                                                    education: education,
                                                                                                    profession: profession,
                                                                                                    partnerEdu: partnerEdu,
                                                                                                    partnerProf: partnerProf,
                                                                                                    candidateNVD: candidateNVD,
                                                                                                    NoParent: NoParent,
                                                                                                    fParentName: fParentName,
                                                                                                    fParentNVD: fParentNVD,
                                                                                                    sParentName: sParentName,
                                                                                                    sParentNVD: sParentNVD,
                                                                                                    tParentName: tParentName,
                                                                                                    tParentNVD: tParentNVD,
                                                                                                    foParentName: foParentName,
                                                                                                    foParentNVD: foParentNVD,
                                                                                                    biodata: biodata,
                                                                                                    fParentVacCer: fParentVacCer,
                                                                                                    sParentVacCer: sParentVacCer,
                                                                                                    tParentVacCer: tParentVacCer,
                                                                                                    foParentVacCer: foParentVacCer,
                                                                                                    candidateVacCer: candidateVacCer,
                                                                                                    candidateAmount: candidateAmount,
                                                                                                    parentAmount: parentAmount
                                                                                                },
                                                                                                success: function(
                                                                                                    response
                                                                                                ) {
                                                                                                    // swal("Biodata: " + response);
                                                                                                    // console.log("Biodata: " + biodata);
                                                                                                    // swal("Registration Done Successfully!");
                                                                                                    // location.reload();
                                                                                                    eventPayForm
                                                                                                        .submit();
                                                                                                    // adminPanelPartLoad('ADMIN_OUR_STORIES');
                                                                                                }
                                                                                            });
                                                                                        } else {
                                                                                            swal(
                                                                                                'An Error Occured! Please Try Again!'
                                                                                            );
                                                                                        }
                                                                                    }
                                                                                });
                                                                            } else {
                                                                                swal(
                                                                                    'An Error Occured! Please Try Again!'
                                                                                );
                                                                            }
                                                                        }
                                                                    });
                                                                } else {
                                                                    swal(
                                                                        'An Error Occured! Please Try Again!'
                                                                    );
                                                                }
                                                            }
                                                        });
                                                    } else {
                                                        swal(
                                                            'An Error Occured! Please Try Again!'
                                                        );
                                                    }
                                                }
                                            });
                                        } else {
                                            swal(
                                                'An Error Occured! Please Try Again!'
                                            );
                                        }
                                    }
                                });
                            });
                        } else {
                            if ($("#biodata").val() == '') {
                                swal('Please Upload Your Profile Photo!');
                            } else {
                                $(".alphaClassP2").each(function() {
                                    if (!$(this).val().match(alphaExp) || $(this).val() == '') {
                                        $(this).css("border", "1px solid red");
                                    } else {
                                        $(this).css("border", "1px solid #7D3668");
                                    }
                                });

                                $(".vacNoValidate").each(function() {
                                    if ($(this).val() == '') {
                                        $(this).css("border", "1px solid red");
                                    } else {
                                        $(this).css("border", "1px solid #7D3668");
                                    }
                                });

                                $(".vacCerValidate").each(function() {
                                    if ($(this).val() == '') {
                                        $(this).css("border", "1px solid red");
                                    } else {
                                        $(this).css("border", "none");
                                    }
                                });
                                swal("Kindly Fill Valid Details In Red Bordered Fields!");
                            }
                        }
                    } else if (NoParent == "4") {
                        if (fParentName.trim() != "" && fParentNVD.trim() != "" && sParentName.trim() !=
                            "" && sParentNVD.trim() != "" && tParentName.trim() != "" && tParentNVD
                            .trim() != "" && foParentName.trim() != "" && foParentNVD.trim() != "" && $(
                                "#fParentVacCer").val() != "" && $("#sParentVacCer").val() != "" && $(
                                "#tParentVacCer").val() != "" && $("#foParentVacCer").val() != "") {
                            let subSt = 1;
                            setInterval(() => {
                                if (subSt) {
                                    subSt = 0;
                                    swal('Redirecting For Payment, Please Wait...');
                                    subSt = 1;
                                }
                            }, 100);
                            candidateAmount = "15050";
                            parentAmount = "8400";
                            // var fd = new FormData();
                            // var files;
                            // var viewWidthForImgUpload = window.matchMedia("(max-width: 720px)");
                            // if (viewWidthForImgUpload.matches) {
                            //   files = $('#biodata')[0].files;
                            // } else {
                            //   files = $('#biodata')[0].files;
                            // }
                            // fd.append('file', files[0]);
                            // $.ajax({
                            //   url: "helper/biodataUpload.php",
                            //   type: "POST",
                            //   data: fd,
                            //   contentType: false,
                            //   processData: false,
                            $uploadCrop.croppie('result', {
                                type: 'canvas',
                                size: 'viewport'
                            }).then(function(resp) {
                                $.ajax({
                                    url: "helper/biodataUpload.php",
                                    type: "POST",
                                    data: {
                                        "image": resp,
                                        "fileExt": fileExt
                                    },
                                    success: function(responseBio) {
                                        if (responseBio != "0") {
                                            // swal(responseBio);
                                            biodata = responseBio;
                                            var fd = new FormData();
                                            var files;
                                            var viewWidthForImgUpload = window
                                                .matchMedia("(max-width: 720px)");
                                            if (viewWidthForImgUpload.matches) {
                                                files = $('#candidateVacCer')[0]
                                                    .files;
                                            } else {
                                                files = $('#candidateVacCer')[0]
                                                    .files;
                                            }
                                            fd.append('file', files[0]);
                                            $.ajax({
                                                url: "helper/candidateVacCer.php",
                                                type: "POST",
                                                data: fd,
                                                contentType: false,
                                                processData: false,
                                                success: function(
                                                    responseCanVacCer) {
                                                    if (responseCanVacCer !=
                                                        "0") {
                                                        candidateVacCer
                                                            =
                                                            responseCanVacCer;
                                                        var fd =
                                                            new FormData();
                                                        var files;
                                                        var viewWidthForImgUpload =
                                                            window
                                                            .matchMedia(
                                                                "(max-width: 720px)"
                                                            );
                                                        if (viewWidthForImgUpload
                                                            .matches) {
                                                            files = $(
                                                                    '#fParentVacCer'
                                                                )[0]
                                                                .files;
                                                        } else {
                                                            files = $(
                                                                    '#fParentVacCer'
                                                                )[0]
                                                                .files;
                                                        }
                                                        fd.append(
                                                            'file',
                                                            files[0]
                                                        );
                                                        $.ajax({
                                                            url: "helper/fParentVacCer.php",
                                                            type: "POST",
                                                            data: fd,
                                                            contentType: false,
                                                            processData: false,
                                                            success: function(
                                                                responseFParentVacCer
                                                            ) {
                                                                if (responseFParentVacCer !=
                                                                    "0"
                                                                ) {
                                                                    fParentVacCer
                                                                        =
                                                                        responseFParentVacCer;
                                                                    var fd =
                                                                        new FormData();
                                                                    var
                                                                        files;
                                                                    var viewWidthForImgUpload =
                                                                        window
                                                                        .matchMedia(
                                                                            "(max-width: 720px)"
                                                                        );
                                                                    if (viewWidthForImgUpload
                                                                        .matches
                                                                    ) {
                                                                        files
                                                                            =
                                                                            $(
                                                                                '#sParentVacCer'
                                                                            )[
                                                                                0
                                                                            ]
                                                                            .files;
                                                                    } else {
                                                                        files
                                                                            =
                                                                            $(
                                                                                '#sParentVacCer'
                                                                            )[
                                                                                0
                                                                            ]
                                                                            .files;
                                                                    }
                                                                    fd.append(
                                                                        'file',
                                                                        files[
                                                                            0
                                                                        ]
                                                                    );
                                                                    $.ajax({
                                                                        url: "helper/sParentVacCer.php",
                                                                        type: "POST",
                                                                        data: fd,
                                                                        contentType: false,
                                                                        processData: false,
                                                                        success: function(
                                                                            responseSParentVacCer
                                                                        ) {
                                                                            if (responseSParentVacCer !=
                                                                                "0"
                                                                            ) {
                                                                                sParentVacCer
                                                                                    =
                                                                                    responseSParentVacCer;
                                                                                var fd =
                                                                                    new FormData();
                                                                                var
                                                                                    files;
                                                                                var viewWidthForImgUpload =
                                                                                    window
                                                                                    .matchMedia(
                                                                                        "(max-width: 720px)"
                                                                                    );
                                                                                if (viewWidthForImgUpload
                                                                                    .matches
                                                                                ) {
                                                                                    files
                                                                                        =
                                                                                        $(
                                                                                            '#tParentVacCer'
                                                                                        )[
                                                                                            0
                                                                                        ]
                                                                                        .files;
                                                                                } else {
                                                                                    files
                                                                                        =
                                                                                        $(
                                                                                            '#tParentVacCer'
                                                                                        )[
                                                                                            0
                                                                                        ]
                                                                                        .files;
                                                                                }
                                                                                fd.append(
                                                                                    'file',
                                                                                    files[
                                                                                        0
                                                                                    ]
                                                                                );
                                                                                $.ajax({
                                                                                    url: "helper/tParentVacCer.php",
                                                                                    type: "POST",
                                                                                    data: fd,
                                                                                    contentType: false,
                                                                                    processData: false,
                                                                                    success: function(
                                                                                        responseTParentVacCer
                                                                                    ) {
                                                                                        if (responseTParentVacCer !=
                                                                                            "0"
                                                                                        ) {
                                                                                            tParentVacCer
                                                                                                =
                                                                                                responseTParentVacCer;
                                                                                            var fd =
                                                                                                new FormData();
                                                                                            var
                                                                                                files;
                                                                                            var viewWidthForImgUpload =
                                                                                                window
                                                                                                .matchMedia(
                                                                                                    "(max-width: 720px)"
                                                                                                );
                                                                                            if (viewWidthForImgUpload
                                                                                                .matches
                                                                                            ) {
                                                                                                files
                                                                                                    =
                                                                                                    $(
                                                                                                        '#tParentVacCer'
                                                                                                    )[
                                                                                                        0
                                                                                                    ]
                                                                                                    .files;
                                                                                            } else {
                                                                                                files
                                                                                                    =
                                                                                                    $(
                                                                                                        '#tParentVacCer'
                                                                                                    )[
                                                                                                        0
                                                                                                    ]
                                                                                                    .files;
                                                                                            }
                                                                                            fd.append(
                                                                                                'file',
                                                                                                files[
                                                                                                    0
                                                                                                ]
                                                                                            );
                                                                                            $.ajax({
                                                                                                url: "helper/foParentVacCer.php",
                                                                                                type: "POST",
                                                                                                data: fd,
                                                                                                contentType: false,
                                                                                                processData: false,
                                                                                                success: function(
                                                                                                    responseFoParentVacCer
                                                                                                ) {
                                                                                                    if (responseFoParentVacCer !=
                                                                                                        "0"
                                                                                                    ) {
                                                                                                        foParentVacCer
                                                                                                            =
                                                                                                            responseFoParentVacCer;
                                                                                                        $.ajax({
                                                                                                            type: 'post',
                                                                                                            url: 'helper/registerForEvent.php',
                                                                                                            data: {
                                                                                                                // AkshadaaID: AkshadaaID,
                                                                                                                firstname: firstname,
                                                                                                                middlename: middlename,
                                                                                                                lastname: lastname,
                                                                                                                address: address,
                                                                                                                email: email,
                                                                                                                contactnumber: contactnumber,
                                                                                                                whatsappnumber: whatsappnumber,
                                                                                                                bloodgorup: bloodgorup,
                                                                                                                gender: gender,
                                                                                                                firstGotram: firstGotram,
                                                                                                                secondGotram: secondGotram,
                                                                                                                birthname: birthname,
                                                                                                                dob: dob,
                                                                                                                education: education,
                                                                                                                profession: profession,
                                                                                                                partnerEdu: partnerEdu,
                                                                                                                partnerProf: partnerProf,
                                                                                                                candidateNVD: candidateNVD,
                                                                                                                NoParent: NoParent,
                                                                                                                fParentName: fParentName,
                                                                                                                fParentNVD: fParentNVD,
                                                                                                                sParentName: sParentName,
                                                                                                                sParentNVD: sParentNVD,
                                                                                                                tParentName: tParentName,
                                                                                                                tParentNVD: tParentNVD,
                                                                                                                foParentName: foParentName,
                                                                                                                foParentNVD: foParentNVD,
                                                                                                                biodata: biodata,
                                                                                                                fParentVacCer: fParentVacCer,
                                                                                                                sParentVacCer: sParentVacCer,
                                                                                                                tParentVacCer: tParentVacCer,
                                                                                                                foParentVacCer: foParentVacCer,
                                                                                                                candidateVacCer: candidateVacCer,
                                                                                                                candidateAmount: candidateAmount,
                                                                                                                parentAmount: parentAmount
                                                                                                            },
                                                                                                            success: function(
                                                                                                                response
                                                                                                            ) {
                                                                                                                // swal("Biodata: " + response);
                                                                                                                // console.log("Biodata: " + biodata);
                                                                                                                // swal("Registration Done Successfully!");
                                                                                                                // location.reload();
                                                                                                                eventPayForm
                                                                                                                    .submit();
                                                                                                                // adminPanelPartLoad('ADMIN_OUR_STORIES');
                                                                                                            }
                                                                                                        });
                                                                                                    } else {
                                                                                                        swal(
                                                                                                            'An Error Occured! Please Try Again!'
                                                                                                        );
                                                                                                    }
                                                                                                }
                                                                                            });
                                                                                        } else {
                                                                                            swal(
                                                                                                'An Error Occured! Please Try Again!'
                                                                                            );
                                                                                        }
                                                                                    }
                                                                                });
                                                                            } else {
                                                                                swal(
                                                                                    'An Error Occured! Please Try Again!'
                                                                                );
                                                                            }
                                                                        }
                                                                    });
                                                                } else {
                                                                    swal(
                                                                        'An Error Occured! Please Try Again!'
                                                                    );
                                                                }
                                                            }
                                                        });
                                                    } else {
                                                        swal(
                                                            'An Error Occured! Please Try Again!'
                                                        );
                                                    }
                                                }
                                            });
                                        } else {
                                            swal(
                                                'An Error Occured! Please Try Again!'
                                            );
                                        }
                                    }
                                });
                            });
                        } else {
                            if ($("#biodata").val() == '') {
                                swal('Please Upload Your Profile Photo!');
                            } else {
                                $(".alphaClassP2").each(function() {
                                    if (!$(this).val().match(alphaExp) || $(this).val() == '') {
                                        $(this).css("border", "1px solid red");
                                    } else {
                                        $(this).css("border", "1px solid #7D3668");
                                    }
                                });

                                $(".vacNoValidate").each(function() {
                                    if ($(this).val() == '') {
                                        $(this).css("border", "1px solid red");
                                    } else {
                                        $(this).css("border", "1px solid #7D3668");
                                    }
                                });

                                $(".vacCerValidate").each(function() {
                                    if ($(this).val() == '') {
                                        $(this).css("border", "1px solid red");
                                    } else {
                                        $(this).css("border", "none");
                                    }
                                });
                                swal("Kindly Fill Valid Details In Red Bordered Fields!");
                            }
                        }
                    }
                    // $.ajax({
                    //   type: 'post',
                    //   url: 'helper/registerForEvent.php',
                    //   data: {
                    //     AkshadaaID: AkshadaaID,
                    //     firstname: firstname,
                    //     middlename: middlename,
                    //     lastname: lastname,
                    //     address: address,
                    //     email: email,
                    //     contactnumber: contactnumber,
                    //     whatsappnumber: whatsappnumber,
                    //     bloodgorup: bloodgorup,
                    //     gender: gender,
                    //     birthname: birthname,
                    //     dob: dob,
                    //     education: education,
                    //     profession: profession,
                    //     partnerEdu: partnerEdu,
                    //     partnerProf: partnerProf,
                    //     candidateNVD: candidateNVD,
                    //     NoParent: NoParent,
                    //     fParentName: fParentName,
                    //     fParentNVD: fParentNVD,
                    //     sParentName: sParentName,
                    //     sParentNVD: sParentNVD,
                    //     biodata: biodata,
                    //     fParentVacCer: fParentVacCer,
                    //     sParentVacCer: sParentVacCer,
                    //     candidateVacCer: candidateVacCer,
                    //     candidateAmount: candidateAmount,
                    //     parentAmount: parentAmount
                    //   },
                    //   success: function(response) {
                    //     swal("Biodata: " + response);
                    //     console.log("Biodata: " + biodata);
                    //     // adminPanelPartLoad('ADMIN_OUR_STORIES');
                    //   }
                    // });
                } else {
                    if ($("#biodata").val() == '') {
                        swal('Please Upload Your Profile Photo!');
                    } else {
                        $(".alphaClassP2").each(function() {
                            if (!$(this).val().match(alphaExp) || $(this).val() == '') {
                                $(this).css("border", "1px solid red");
                            } else {
                                $(this).css("border", "1px solid #7D3668");
                            }
                        });

                        $(".vacNoValidate").each(function() {
                            if ($(this).val() == '') {
                                $(this).css("border", "1px solid red");
                            } else {
                                $(this).css("border", "1px solid #7D3668");
                            }
                        });

                        $(".vacCerValidate").each(function() {
                            if ($(this).val() == '') {
                                $(this).css("border", "1px solid red");
                            } else {
                                $(this).css("border", "none");
                            }
                        });
                        swal("Kindly Fill Valid Details In Red Bordered Fields!");
                    }
                }
            });
        });
        </script>
    </body>

    </html>