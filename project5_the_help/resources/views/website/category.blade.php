<!DOCTYPE html>
<html>

<head>
<title>SuperClean Cleaning Services</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="format-detection" content="telephone=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="author" content="">
<meta name="keywords" content="">
<meta name="description" content="">

<!-- Stylesheets -->
<link rel="stylesheet" type="text/css" href="{{ asset('assetts/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assetts/css/vendor.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
<link rel="stylesheet" type="text/css" href="{{ asset('assetts/css/style.css') }}">

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Source+Sans+3:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>

  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol xmlns="http://www.w3.org/2000/svg" id="navbar-icon" viewBox="0 0 16 16">
      <path
        d="M14 10.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 .5-.5zm0-3a.5.5 0 0 0-.5-.5h-7a.5.5 0 0 0 0 1h7a.5.5 0 0 0 .5-.5zm0-3a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0 0 1h11a.5.5 0 0 0 .5-.5z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/symbol" id="location" viewBox="0 0 24 24">
      <path fill="currentColor" fill-rule="evenodd" d="M3.25 10.143C3.25 5.244 7.155 1.25 12 1.25c4.845 0 8.75 3.994 8.75 8.893c0 2.365-.674 4.905-1.866 7.099c-1.19 2.191-2.928 4.095-5.103 5.112a4.2 4.2 0 0 1-3.562 0c-2.175-1.017-3.913-2.92-5.103-5.112c-1.192-2.194-1.866-4.734-1.866-7.099M12 2.75c-3.992 0-7.25 3.297-7.25 7.393c0 2.097.603 4.392 1.684 6.383c1.082 1.993 2.612 3.624 4.42 4.469a2.7 2.7 0 0 0 2.291 0c1.809-.845 3.339-2.476 4.421-4.469c1.081-1.99 1.684-4.286 1.684-6.383c0-4.096-3.258-7.393-7.25-7.393m0 5a2.25 2.25 0 1 0 0 4.5a2.25 2.25 0 0 0 0-4.5M8.25 10a3.75 3.75 0 1 1 7.5 0a3.75 3.75 0 0 1-7.5 0" clip-rule="evenodd"/>
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="phone" viewBox="0 0 24 24">
      <path fill="currentColor" fill-rule="evenodd" d="M4.718 3.092c1.226-1.291 3.254-1.05 4.268.384l1.26 1.784c.811 1.147.743 2.74-.225 3.76l-.245.257a.25.25 0 0 0-.002.006c-.013.036-.045.152-.013.372c.067.455.418 1.381 1.846 2.884c1.432 1.508 2.3 1.863 2.703 1.929a.608.608 0 0 0 .294-.007l.408-.43c.874-.92 2.236-1.101 3.335-.469l1.91 1.1c1.633.94 2.013 3.239.708 4.613l-1.42 1.495c-.443.467-1.048.866-1.795.94c-1.824.18-6.049-.055-10.478-4.719c-4.134-4.351-4.919-8.136-5.018-9.985l.666-.036l-.666.036c-.049-.914.358-1.697.894-2.262zm3.043 1.25c-.512-.724-1.433-.768-1.956-.217l-1.57 1.652c-.33.35-.505.75-.483 1.149c.08 1.51.731 4.952 4.607 9.032c4.064 4.28 7.809 4.4 9.244 4.259c.283-.028.575-.186.854-.48l1.42-1.495c.614-.646.453-1.808-.368-2.28l-1.91-1.1c-.513-.295-1.114-.204-1.499.202l-.456.48l-.527-.501c.527.5.527.501.526.502l-.001.001l-.003.004l-.007.006l-.014.014a1.007 1.007 0 0 1-.136.112c-.08.056-.186.119-.321.172c-.276.109-.64.167-1.091.094c-.878-.142-2.028-.773-3.55-2.376c-1.528-1.608-2.113-2.807-2.243-3.7c-.067-.454-.014-.817.084-1.092a1.591 1.591 0 0 1 .23-.427l.03-.037l.014-.015l.006-.007l.003-.003l.002-.001s0-.002.533.503l-.532-.505l.287-.302c.445-.469.51-1.263.088-1.86z" clip-rule="evenodd"/><path fill="currentColor" d="M13.26 1.88a.751.751 0 0 1 .861-.62c.025.005.107.02.15.03c.085.018.204.048.352.09c.297.087.712.23 1.21.458c.996.457 2.321 1.256 3.697 2.631c1.376 1.376 2.175 2.702 2.632 3.698c.228.498.37.912.457 1.21a5.727 5.727 0 0 1 .113.454l.005.031a.765.765 0 0 1-.617.878a.75.75 0 0 1-.86-.617a2.82 2.82 0 0 0-.081-.327a7.395 7.395 0 0 0-.38-1.004c-.39-.85-1.092-2.024-2.33-3.262c-1.237-1.238-2.411-1.939-3.262-2.329a7.394 7.394 0 0 0-1.003-.38a5.749 5.749 0 0 0-.318-.08a.759.759 0 0 1-.626-.861"/><path fill="currentColor" fill-rule="evenodd" d="M13.486 5.33a.75.75 0 0 1 .927-.516l-.206.721l.207-.72h.002l.004.001l.007.002l.02.007a2.995 2.995 0 0 1 .233.089c.146.062.345.158.59.303c.49.29 1.157.77 1.942 1.556c.785.785 1.267 1.453 1.556 1.942c.145.245.241.444.304.59a2.968 2.968 0 0 1 .089.233l.006.02l.002.008l.001.003v.002l-.72.207l.721-.206a.75.75 0 0 1-1.44.422l-.003-.01a3.67 3.67 0 0 0-.25-.504c-.224-.377-.626-.947-1.326-1.647c-.7-.7-1.27-1.102-1.646-1.325a3.674 3.674 0 0 0-.504-.25l-.01-.004a.75.75 0 0 1-.506-.925" clip-rule="evenodd"/>
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="chevron-back-circle" viewBox="0 0 512 512">
      <path fill="currentColor" d="M256 48C141.13 48 48 141.13 48 256s93.13 208 208 208s208-93.13 208-208S370.87 48 256 48m35.31 292.69a16 16 0 1 1-22.62 22.62l-96-96a16 16 0 0 1 0-22.62l96-96a16 16 0 0 1 22.62 22.62L206.63 256Z"/>
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="chevron-forward-circle" viewBox="0 0 512 512">
      <path fill="currentColor" d="M48 256c0 114.87 93.13 208 208 208s208-93.13 208-208S370.87 48 256 48S48 141.13 48 256m257.37 0l-84.68-84.69a16 16 0 0 1 22.62-22.62l96 96a16 16 0 0 1 0 22.62l-96 96a16 16 0 0 1-22.62-22.62Z"/>
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="email" viewBox="0 0 24 24">
      <path fill="currentColor"
        d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5l-8-5V6l8 5l8-5v2z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="clock" viewBox="0 0 24 24">
      <path fill="currentColor" fill-rule="evenodd" d="M12 2.75a9.25 9.25 0 1 0 0 18.5a9.25 9.25 0 0 0 0-18.5M1.25 12C1.25 6.063 6.063 1.25 12 1.25S22.75 6.063 22.75 12S17.937 22.75 12 22.75S1.25 17.937 1.25 12M12 7.25a.75.75 0 0 1 .75.75v3.69l2.28 2.28a.75.75 0 1 1-1.06 1.06l-2.5-2.5a.75.75 0 0 1-.22-.53V8a.75.75 0 0 1 .75-.75" clip-rule="evenodd"/>
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="star" viewBox="0 0 512 512">
      <path fill="currentColor" d="M394 480a16 16 0 0 1-9.39-3L256 383.76L127.39 477a16 16 0 0 1-24.55-18.08L153 310.35L23 221.2a16 16 0 0 1 9-29.2h160.38l48.4-148.95a16 16 0 0 1 30.44 0l48.4 149H480a16 16 0 0 1 9.05 29.2L359 310.35l50.13 148.53A16 16 0 0 1 394 480"/>
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="play-circle" viewBox="0 0 24 24">
      <path fill="currentColor" d="m9.5 16.5l7-4.5l-7-4.5zM12 22q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12q0-3.35-2.325-5.675T12 4Q8.65 4 6.325 6.325T4 12q0 3.35 2.325 5.675T12 20m0-8"/>
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="earth-outline" viewBox="0 0 24 24">
      <path fill="currentColor" fill-rule="evenodd" d="M5.578 5.343a9.25 9.25 0 0 0 6.803 15.9c-.206-.912-.234-2.138.393-3.319c.652-1.229 2.002-1.762 2.995-2.006a9.183 9.183 0 0 1 1.898-.254h.043c1.673-.018 2.426-.562 2.826-1.08c.342-.444.47-.887.602-1.336l.05-.172A9.22 9.22 0 0 0 18.6 5.519a5.486 5.486 0 0 1-.027.1c-.163.594-.425 1.202-.711 1.636c-.256.388-.752.78-1.164 1.076a9.51 9.51 0 0 1-.902.56c-.228.132-.433.25-.63.38c-.432.286-.766.593-.991 1.056a.665.665 0 0 0-.035.49c.075.272.126.578.126.889c.002.649-.328 1.176-.753 1.518a2.41 2.41 0 0 1-1.521.526c-2.455-.027-3.965-2.02-4.164-4.236c-.08-.881-.466-1.773-.954-2.552a8.838 8.838 0 0 0-1.296-1.62m1.167-.956a10.49 10.49 0 0 1 1.4 1.779c.558.89 1.069 2.012 1.177 3.214c.15 1.68 1.213 2.854 2.686 2.87a.91.91 0 0 0 .563-.194c.146-.117.196-.24.195-.346c0-.156-.026-.328-.072-.495a2.163 2.163 0 0 1 .131-1.542c.385-.794.956-1.285 1.514-1.653c.239-.158.487-.3.71-.43l.09-.05c.255-.148.48-.28.683-.427c.431-.31.704-.557.787-.684c.183-.276.388-.734.518-1.207c.103-.374.131-.662.122-.84A9.207 9.207 0 0 0 12 2.75a9.207 9.207 0 0 0-5.255 1.637M22.68 13.24c.047-.407.071-.82.071-1.24c0-5.937-4.813-10.75-10.75-10.75S1.25 6.063 1.25 12S6.063 22.75 12 22.75c5.46 0 9.97-4.071 10.659-9.344a2.89 2.89 0 0 1 .048-.156zm-2.774 3.567c-.596.218-1.314.348-2.179.357h-.031l-.09.003a7.68 7.68 0 0 0-1.477.208c-.902.221-1.693.62-2.029 1.252c-.456.859-.39 1.793-.22 2.432a9.261 9.261 0 0 0 6.026-4.252" clip-rule="evenodd"/>
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="cup-first-outline" viewBox="0 0 24 24">
      <path fill="currentColor" d="M12.787 5.807a.75.75 0 0 1 .463.693v4a.75.75 0 0 1-1.5 0V8.31l-.22.22a.75.75 0 1 1-1.06-1.06l1.5-1.5a.75.75 0 0 1 .817-.163"/><path fill="currentColor" fill-rule="evenodd" d="M7.498 1.607A27.123 27.123 0 0 1 12 1.25c1.828 0 3.339.161 4.502.357l.135.023c1.01.169 1.85.31 2.506 1.118c.421.519.557 1.08.588 1.705l.492.164c.463.154.87.29 1.191.44c.348.162.667.37.911.709c.244.338.341.707.385 1.088c.04.353.04.78.04 1.27v.144c0 .402 0 .757-.03 1.054c-.032.321-.103.634-.28.936c-.179.303-.418.517-.683.701c-.245.17-.555.343-.907.538l-2.64 1.467c-.54 1.061-1.28 2.007-2.3 2.69c-.875.587-1.922.959-3.16 1.065v2.031h1.43a1.75 1.75 0 0 1 1.716 1.407l.219 1.093H18a.75.75 0 0 1 0 1.5H6a.75.75 0 0 1 0-1.5h1.885l.219-1.093A1.75 1.75 0 0 1 9.82 18.75h1.43v-2.031c-1.238-.106-2.285-.478-3.16-1.064c-1.019-.684-1.76-1.63-2.3-2.691l-2.64-1.467a11.148 11.148 0 0 1-.907-.538a2.217 2.217 0 0 1-.682-.7a2.212 2.212 0 0 1-.281-.937c-.03-.297-.03-.652-.03-1.054v-.145c0-.488 0-.916.04-1.269c.044-.381.14-.75.385-1.088c.244-.339.563-.547.91-.71c.323-.15.729-.285 1.192-.439l.492-.164c.031-.626.167-1.186.588-1.705c.657-.809 1.496-.95 2.507-1.118zM9.415 21.25h5.17l-.16-.799a.25.25 0 0 0-.245-.201H9.82a.25.25 0 0 0-.245.201zM4.302 6.023c.072 1.52.243 3.2.671 4.77l-1.066-.591c-.389-.217-.633-.353-.809-.475c-.162-.113-.215-.18-.244-.23c-.03-.05-.062-.128-.082-.324a10.58 10.58 0 0 1-.022-.938v-.073c0-.539.001-.88.03-1.138c.028-.238.072-.327.112-.381c.039-.055.109-.125.326-.226c.236-.11.56-.219 1.07-.39zm14.725 4.77l1.066-.591c.389-.217.633-.353.809-.475c.162-.113.215-.18.244-.23c.03-.05.062-.128.082-.324c.021-.214.022-.493.022-.938v-.073c0-.539-.001-.88-.03-1.138c-.028-.238-.072-.327-.112-.381c-.039-.055-.109-.125-.326-.226c-.236-.11-.56-.219-1.07-.39l-.014-.004c-.071 1.52-.243 3.2-.67 4.77M12 2.75c-1.74 0-3.167.153-4.252.336c-1.207.204-1.46.28-1.726.608c-.262.322-.287.628-.234 1.983c.09 2.258.388 4.696 1.31 6.55c.456.914 1.052 1.662 1.828 2.182c.77.517 1.765.841 3.074.841c1.31 0 2.304-.324 3.075-.841c.776-.52 1.371-1.268 1.826-2.183c.923-1.853 1.221-4.29 1.31-6.55c.055-1.354.03-1.66-.232-1.982c-.266-.328-.52-.404-1.727-.608A25.627 25.627 0 0 0 12 2.75" clip-rule="evenodd"/>
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="call-chat-rounded-outline" viewBox="0 0 24 24">
      <g fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"><path d="M22.75 7a5.75 5.75 0 1 0-10.9 2.56a.129.129 0 0 1 .013.04v.007l-.297 1.113a1.4 1.4 0 0 0 1.714 1.714l1.113-.298c-.002 0-.001 0 0 0h.007a.126.126 0 0 1 .04.014A5.75 5.75 0 0 0 22.75 7m-8.356 5.136h-.002zM17 2.75a4.25 4.25 0 1 1-1.892 8.057a1.567 1.567 0 0 0-1.102-.12l-.946.253l.253-.946a1.566 1.566 0 0 0-.12-1.102A4.25 4.25 0 0 1 17 2.75"/><path d="M3.007 6.407c1.68-1.68 4.516-1.552 5.685.544l.65 1.163c.763 1.368.438 3.095-.68 4.227a.63.63 0 0 0-.104.337c-.013.256.078.849.997 1.767c.918.918 1.51 1.01 1.767.997a.63.63 0 0 0 .337-.104c1.131-1.118 2.859-1.443 4.227-.68l1.163.65c2.096 1.17 2.224 4.005.544 5.685c-.899.898-2.094 1.697-3.498 1.75c-2.08.079-5.536-.459-8.958-3.88c-3.421-3.422-3.959-6.877-3.88-8.958c.053-1.405.852-2.6 1.75-3.498m4.376 1.275c-.6-1.074-2.21-1.32-3.315-.214c-.775.775-1.28 1.63-1.312 2.493c-.066 1.736.363 4.762 3.442 7.841c3.08 3.08 6.105 3.508 7.84 3.442c.863-.033 1.72-.537 2.494-1.312c1.106-1.106.86-2.716-.214-3.315l-1.163-.649c-.723-.403-1.74-.266-2.452.448c-.07.07-.517.486-1.308.524c-.81.04-1.791-.324-2.9-1.434c-1.111-1.11-1.475-2.091-1.435-2.902c.038-.791.455-1.237.524-1.306c.714-.714.851-1.73.448-2.453z"/></g>
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="battery-charge-outline" viewBox="0 0 24 24">
      <path fill="currentColor" d="M12.076 9.48a.75.75 0 0 0-1.152-.96l-2.5 3A.75.75 0 0 0 9 12.75h1.899l-1.475 1.77a.75.75 0 1 0 1.152.96l2.5-3a.75.75 0 0 0-.576-1.23h-1.899z"/><path fill="currentColor" fill-rule="evenodd" d="M9.944 3.25h1.612c1.838 0 3.294 0 4.433.153c1.172.158 2.121.49 2.87 1.238c.748.749 1.08 1.698 1.238 2.87c.069.513.107 1.091.128 1.74c.362 0 .695.005.972.042c.356.048.731.16 1.04.47c.31.309.422.684.47 1.04c.043.323.043.72.043 1.152v.09c0 .433 0 .83-.043 1.152c-.048.356-.16.731-.47 1.04c-.309.31-.684.422-1.04.47c-.277.037-.61.042-.972.043c-.021.648-.06 1.226-.128 1.739c-.158 1.172-.49 2.121-1.238 2.87c-.749.748-1.698 1.08-2.87 1.238c-1.14.153-2.595.153-4.433.153H9.945c-1.838 0-3.294 0-4.433-.153c-1.172-.158-2.121-.49-2.87-1.238c-.748-.749-1.08-1.698-1.238-2.87c-.153-1.14-.153-2.595-.153-4.433v-.112c0-1.838 0-3.294.153-4.433c.158-1.172.49-2.121 1.238-2.87c.749-.748 1.698-1.08 2.87-1.238c1.14-.153 2.595-.153 4.433-.153M5.71 4.89c-1.006.135-1.586.389-2.01.812c-.422.423-.676 1.003-.811 2.009c-.138 1.028-.14 2.382-.14 4.289c0 1.907.002 3.262.14 4.29c.135 1.005.389 1.585.812 2.008c.423.423 1.003.677 2.009.812c1.028.138 2.382.14 4.289.14h1.5c1.907 0 3.262-.002 4.29-.14c1.005-.135 1.585-.389 2.008-.812c.423-.423.677-1.003.812-2.009c.138-1.028.14-2.382.14-4.289c0-1.907-.002-3.261-.14-4.29c-.135-1.005-.389-1.585-.812-2.008c-.423-.423-1.003-.677-2.009-.812c-1.027-.138-2.382-.14-4.289-.14H10c-1.907 0-3.261.002-4.29.14m15.039 5.87v2.48c.095-.004.176-.01.247-.02a.702.702 0 0 0 .177-.042l.003-.001l.001-.003a.702.702 0 0 0 .042-.177c.028-.21.03-.504.03-.997s-.002-.787-.03-.997a.702.702 0 0 0-.042-.177l-.001-.003l-.003-.001a.702.702 0 0 0-.177-.042a2.865 2.865 0 0 0-.247-.02" clip-rule="evenodd"/>
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="smart-vacuum-cleaner-outline" viewBox="0 0 24 24">
      <path fill="currentColor" fill-rule="evenodd" d="M12 2.75a9.25 9.25 0 1 0 0 18.5a9.25 9.25 0 0 0 0-18.5M1.25 12C1.25 6.063 6.063 1.25 12 1.25S22.75 6.063 22.75 12c0 1.64-.367 3.195-1.025 4.586a3.75 3.75 0 0 1-5.14 5.14A10.709 10.709 0 0 1 12 22.75c-1.64 0-3.195-.367-4.586-1.025a3.75 3.75 0 0 1-5.14-5.14A10.709 10.709 0 0 1 1.25 12m2.012 6.263a2.25 2.25 0 0 0 2.475 2.475a10.811 10.811 0 0 1-2.475-2.475m15.002 2.475a2.25 2.25 0 0 0 2.474-2.474a10.812 10.812 0 0 1-2.474 2.474M12 6.75a2.25 2.25 0 1 0 0 4.5a2.25 2.25 0 0 0 0-4.5M8.25 9a3.75 3.75 0 1 1 7.5 0a3.75 3.75 0 0 1-7.5 0M12 15.25a.75.75 0 0 1 .75.75v2a.75.75 0 0 1-1.5 0v-2a.75.75 0 0 1 .75-.75" clip-rule="evenodd"/>
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="calendar-outline" viewBox="0 0 24 24">
      <path fill="currentColor" d="M17 14a1 1 0 1 0 0-2a1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2a1 1 0 0 0 0 2m-4-5a1 1 0 1 1-2 0a1 1 0 0 1 2 0m0 4a1 1 0 1 1-2 0a1 1 0 0 1 2 0m-6-3a1 1 0 1 0 0-2a1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2a1 1 0 0 0 0 2"/><path fill="currentColor" fill-rule="evenodd" d="M7 1.75a.75.75 0 0 1 .75.75v.763c.662-.013 1.391-.013 2.193-.013h4.113c.803 0 1.532 0 2.194.013V2.5a.75.75 0 0 1 1.5 0v.827c.26.02.506.045.739.076c1.172.158 2.121.49 2.87 1.238c.748.749 1.08 1.698 1.238 2.87c.153 1.14.153 2.595.153 4.433v2.112c0 1.838 0 3.294-.153 4.433c-.158 1.172-.49 2.121-1.238 2.87c-.749.748-1.698 1.08-2.87 1.238c-1.14.153-2.595.153-4.433.153H9.945c-1.838 0-3.294 0-4.433-.153c-1.172-.158-2.121-.49-2.87-1.238c-.748-.749-1.08-1.698-1.238-2.87c-.153-1.14-.153-2.595-.153-4.433v-2.112c0-1.838 0-3.294.153-4.433c.158-1.172.49-2.121 1.238-2.87c.749-.748 1.698-1.08 2.87-1.238c.233-.031.48-.056.739-.076V2.5A.75.75 0 0 1 7 1.75M5.71 4.89c-1.005.135-1.585.389-2.008.812c-.423.423-.677 1.003-.812 2.009c-.023.17-.042.35-.058.539h18.336c-.016-.19-.035-.369-.058-.54c-.135-1.005-.389-1.585-.812-2.008c-.423-.423-1.003-.677-2.009-.812c-1.027-.138-2.382-.14-4.289-.14h-4c-1.907 0-3.261.002-4.29.14M2.75 12c0-.854 0-1.597.013-2.25h18.474c.013.653.013 1.396.013 2.25v2c0 1.907-.002 3.262-.14 4.29c-.135 1.005-.389 1.585-.812 2.008c-.423.423-1.003.677-2.009.812c-1.027.138-2.382.14-4.289.14h-4c-1.907 0-3.261-.002-4.29-.14c-1.005-.135-1.585-.389-2.008-.812c-.423-.423-.677-1.003-.812-2.009c-.138-1.027-.14-2.382-.14-4.289z" clip-rule="evenodd"/>
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="point-on-map-outline" viewBox="0 0 24 24">
      <path fill="currentColor" fill-rule="evenodd" d="M5.25 7.7c0-3.598 3.059-6.45 6.75-6.45c3.608 0 6.612 2.725 6.745 6.208l.478.16c.463.153.87.289 1.191.439c.348.162.667.37.911.709c.244.338.341.707.385 1.088c.04.353.04.78.04 1.269v5.748c0 .61 0 1.13-.047 1.547c-.05.438-.161.87-.463 1.237a2.25 2.25 0 0 1-.62.525c-.412.237-.855.276-1.296.253c-.42-.022-.933-.107-1.534-.208l-.041-.007c-1.293-.215-1.814-.296-2.322-.254a4.3 4.3 0 0 0-.552.083c-.498.109-.976.342-2.159.933l-.122.061c-1.383.692-2.234 1.118-3.154 1.251c-.276.04-.555.06-.835.06c-.928-.002-1.825-.301-3.28-.786a73.75 73.75 0 0 1-.127-.043l-.384-.128l-.037-.012c-.463-.154-.87-.29-1.191-.44c-.348-.162-.667-.37-.911-.709c-.244-.338-.341-.707-.385-1.088c-.04-.353-.04-.78-.04-1.269v-5.02c0-.786 0-1.448.067-1.967c.07-.542.23-1.072.666-1.47a2.25 2.25 0 0 1 .42-.304c.517-.287 1.07-.27 1.605-.166c.11.021.223.047.342.078c-.066-.446-.1-.89-.1-1.328m.499 3.01a9.414 9.414 0 0 0-1.028-.288c-.395-.077-.525-.03-.586.004a.747.747 0 0 0-.14.101c-.053.048-.138.156-.19.556c-.053.41-.055.974-.055 1.825v4.93c0 .539.001.88.03 1.138c.028.238.072.327.112.381c.039.055.109.125.326.226c.236.11.56.219 1.07.39l.384.127c1.624.541 2.279.75 2.936.752c.207 0 .413-.015.617-.044c.65-.094 1.276-.397 2.82-1.17l.093-.046c1.06-.53 1.714-.857 2.417-1.01c.246-.054.496-.092.747-.113c.717-.06 1.432.06 2.593.253l.1.017c.655.109 1.083.18 1.407.196c.312.016.419-.025.471-.055a.749.749 0 0 0 .207-.175c.039-.047.097-.146.132-.456c.037-.323.038-.757.038-1.42v-5.667c0-.539-.001-.88-.03-1.138c-.028-.238-.072-.327-.112-.381c-.039-.055-.109-.125-.326-.226c-.236-.11-.56-.219-1.07-.39l-.06-.019a10.701 10.701 0 0 1-1.335 3.788c-.912 1.568-2.247 2.934-3.92 3.663a3.505 3.505 0 0 1-2.794 0c-1.673-.73-3.008-2.095-3.92-3.663a10.856 10.856 0 0 1-.934-2.087M12 2.75c-2.936 0-5.25 2.252-5.25 4.95c0 1.418.437 2.98 1.23 4.341c.791 1.362 1.908 2.47 3.223 3.044c.505.22 1.089.22 1.594 0c1.316-.574 2.432-1.682 3.224-3.044c.792-1.36 1.229-2.923 1.229-4.34c0-2.699-2.314-4.951-5.25-4.951m0 4a1.25 1.25 0 1 0 0 2.5a1.25 1.25 0 0 0 0-2.5M9.25 8a2.75 2.75 0 1 1 5.5 0a2.75 2.75 0 0 1-5.5 0" clip-rule="evenodd"/>
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="pen-new-round-outline" viewBox="0 0 24 24">
      <path fill="currentColor" fill-rule="evenodd" d="M1.25 12C1.25 6.063 6.063 1.25 12 1.25a.75.75 0 0 1 0 1.5A9.25 9.25 0 1 0 21.25 12a.75.75 0 0 1 1.5 0c0 5.937-4.813 10.75-10.75 10.75S1.25 17.937 1.25 12m15.52-9.724a3.503 3.503 0 0 1 4.954 4.953l-6.648 6.649c-.371.37-.604.604-.863.806a5.34 5.34 0 0 1-.987.61c-.297.141-.61.245-1.107.411l-2.905.968a1.492 1.492 0 0 1-1.887-1.887l.968-2.905c.166-.498.27-.81.411-1.107c.167-.35.372-.68.61-.987c.202-.26.435-.492.806-.863zm3.893 1.06a2.003 2.003 0 0 0-2.832 0l-.376.377c.022.096.054.21.098.338c.143.413.415.957.927 1.469a3.875 3.875 0 0 0 1.807 1.025l.376-.376a2.003 2.003 0 0 0 0-2.832m-1.558 4.391a5.397 5.397 0 0 1-1.686-1.146a5.395 5.395 0 0 1-1.146-1.686L11.218 9.95c-.417.417-.58.582-.72.76a3.84 3.84 0 0 0-.437.71c-.098.203-.172.423-.359.982l-.431 1.295l1.032 1.033l1.295-.432c.56-.187.779-.261.983-.358c.251-.12.49-.267.71-.439c.177-.139.342-.302.759-.718z" clip-rule="evenodd"/>
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="facebook" viewBox="0 0 24 24">
      <path fill="currentColor"
        d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="youtube" viewBox="0 0 32 32">
      <path fill="currentColor"
        d="M29.41 9.26a3.5 3.5 0 0 0-2.47-2.47C24.76 6.2 16 6.2 16 6.2s-8.76 0-10.94.59a3.5 3.5 0 0 0-2.47 2.47A36.13 36.13 0 0 0 2 16a36.13 36.13 0 0 0 .59 6.74a3.5 3.5 0 0 0 2.47 2.47c2.18.59 10.94.59 10.94.59s8.76 0 10.94-.59a3.5 3.5 0 0 0 2.47-2.47A36.13 36.13 0 0 0 30 16a36.13 36.13 0 0 0-.59-6.74ZM13.2 20.2v-8.4l7.27 4.2Z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="instagram" viewBox="0 0 256 256">
      <path fill="currentColor"
        d="M128 80a48 48 0 1 0 48 48a48.05 48.05 0 0 0-48-48Zm0 80a32 32 0 1 1 32-32a32 32 0 0 1-32 32Zm48-136H80a56.06 56.06 0 0 0-56 56v96a56.06 56.06 0 0 0 56 56h96a56.06 56.06 0 0 0 56-56V80a56.06 56.06 0 0 0-56-56Zm40 152a40 40 0 0 1-40 40H80a40 40 0 0 1-40-40V80a40 40 0 0 1 40-40h96a40 40 0 0 1 40 40ZM192 76a12 12 0 1 1-12-12a12 12 0 0 1 12 12Z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="twitter" viewBox="0 0 24 24">
      <path fill="currentColor"
        d="M22.46 6c-.77.35-1.6.58-2.46.69c.88-.53 1.56-1.37 1.88-2.38c-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29c0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15c0 1.49.75 2.81 1.91 3.56c-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07a4.28 4.28 0 0 0 4 2.98a8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21C16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56c.84-.6 1.56-1.36 2.14-2.23Z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="linkedin" viewBox="0 0 512 512">
      <path fill="currentColor"
        d="M444.17 32H70.28C49.85 32 32 46.7 32 66.89v374.72C32 461.91 49.85 480 70.28 480h373.78c20.54 0 35.94-18.21 35.94-38.39V66.89C480.12 46.7 464.6 32 444.17 32Zm-273.3 373.43h-64.18V205.88h64.18ZM141 175.54h-.46c-20.54 0-33.84-15.29-33.84-34.43c0-19.49 13.65-34.42 34.65-34.42s33.85 14.82 34.31 34.42c-.01 19.14-13.31 34.43-34.66 34.43Zm264.43 229.89h-64.18V296.32c0-26.14-9.34-44-32.56-44c-17.74 0-28.24 12-32.91 23.69c-1.75 4.2-2.22 9.92-2.22 15.76v113.66h-64.18V205.88h64.18v27.77c9.34-13.3 23.93-32.44 57.88-32.44c42.13 0 74 27.77 74 87.64Z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="search" viewBox="0 0 512 512">
      <path fill="currentColor" d="M456.69 421.39L362.6 327.3a173.81 173.81 0 0 0 34.84-104.58C397.44 126.38 319.06 48 222.72 48S48 126.38 48 222.72s78.38 174.72 174.72 174.72A173.81 173.81 0 0 0 327.3 362.6l94.09 94.09a25 25 0 0 0 35.3-35.3M97.92 222.72a124.8 124.8 0 1 1 124.8 124.8a124.95 124.95 0 0 1-124.8-124.8"/>
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="arrow-down" viewBox="0 0 16 16">
      <path fill-rule="evenodd"
        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="plus" viewBox="0 0 16 16">
      <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="minus" viewBox="0 0 16 16">
      <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
    </symbol>
  </svg>

  <header id="header">
    <nav class="header-top bg-gray pt-2 pb-2">
      <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-center">
          <ul class="info d-flex flex-wrap list-unstyled m-0">
            <li class="location text-capitalize d-flex align-items-center me-4">
              <svg class="accent-color me-1" width="18" height="18">
                <use xlink:href="#location"></use>
              </svg>State Road 54 Trinity, Florida
            </li>
            <li class="phone text-capitalize d-flex align-items-center me-4">
              <svg class="accent-color me-1" width="18" height="18">
                <use xlink:href="#phone"></use>
              </svg>call: 666 333 9999
            </li>
            <li class="time text-capitalize d-flex align-items-center me-4">
              <svg class="accent-color me-1" width="18" height="18">
                <use xlink:href="#clock"></use>
              </svg>8:00-18:00, Sat: Closed
            </li>
          </ul>
          <div class="btn-quote">
            <a href="quote.html" class="btn btn-outline btn-outline-small text-uppercase">Get a free quote</a>
          </div>
        </div>
      </div>
    </nav>

    <nav id="primary-header" class="navbar navbar-expand-lg py-3">
      <div class="container">
        <a class="navbar-brand" href="index.html">
          <img src="{{asset  ('assetts') }}/images/main-logo.png" class="logo img-fluid">
        </a>
        <button class="navbar-toggler border-0 d-flex d-lg-none order-3 p-2 shadow-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#bdNavbar" aria-controls="bdNavbar" aria-expanded="false">
          <svg class="navbar-icon" width="60" height="60">
            <use xlink:href="#navbar-icon"></use>
          </svg>
        </button>
        <div class="header-bottom offcanvas offcanvas-end" id="bdNavbar" aria-labelledby="bdNavbarOffcanvasLabel">
          <div class="offcanvas-header px-4 pb-0">
            <button type="button" class="btn-close btn-close-black" data-bs-dismiss="offcanvas" aria-label="Close" data-bs-target="#bdNavbar"></button>
          </div>
          <div class="offcanvas-body align-items-center justify-content-end">
            <ul class="navbar-nav mb-2 mb-lg-0">
              <li class="nav-item px-3">
                <a class="nav-link p-0" aria-current="page" href="index.html">Home</a>
              </li>
              <li class="nav-item px-3">
                <a class="nav-link p-0" href="about.html">About Us</a>
              </li>
              <li class="nav-item px-3">
                <a class="nav-link active p-0" href="services.html">Services</a>
              </li>
              <li class="nav-item px-3">
                <a class="nav-link p-0" href="blog.html">Our Blog</a>
              </li>
              <li class="nav-item px-3">
                <a class="nav-link p-0" href="contact.html">Contact</a>
              </li>
              <li class="nav-item px-3 dropdown">
                <a class="nav-link p-0 dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Pages</a>
                <ul class="dropdown-menu dropdown-menu-end animate slide mt-3 border-0 shadow">
                  <li class="py-1"><a href="about.html" class="dropdown-item text-uppercase">About <span
                        class="badge bg-secondary">Pro</span></a></li>
                  <li class="py-1"><a href="services.html" class="dropdown-item active text-uppercase">Services <span
                        class="badge bg-secondary">Pro</span></a></li>
                  <li class="py-1"><a href="service-single.html" class="dropdown-item text-uppercase">Service Single <span
                        class="badge bg-secondary">Pro</span></a></li>
                  <li class="py-1"><a href="blog.html" class="dropdown-item text-uppercase">Blog <span
                        class="badge bg-secondary">Pro</span></a></li>
                  <li class="py-1"><a href="blog-single.html" class="dropdown-item text-uppercase">Blog-Single <span
                        class="badge bg-secondary">Pro</span></a></li>
                  <li class="py-1"><a href="quote.html" class="dropdown-item text-uppercase">Quote <span
                        class="badge bg-secondary">Pro</span></a></li>                  
                  <li class="py-1"><a href="pricing.html" class="dropdown-item text-uppercase">Pricing <span
                        class="badge bg-secondary">Pro</span></a></li>
                  <li class="py-1"><a href="team.html" class="dropdown-item text-uppercase">Our Team <span
                        class="badge bg-secondary">Pro</span></a></li>
                  <li class="py-1"><a href="review.html" class="dropdown-item text-uppercase">Reviews <span
                        class="badge bg-secondary">Pro</span></a></li>
                  <li class="py-1"><a href="faq.html" class="dropdown-item text-uppercase">FAQs <span
                        class="badge bg-secondary">Pro</span></a></li>
                  <li class="py-1"><a href="contact.html" class="dropdown-item text-uppercase">Contact <span
                        class="badge bg-secondary">Pro</span></a></li>
                </ul>
              </li>
              <li class="nav-item px-3">
                <a class="nav-link p-0 fw-bold text-uppercase" href="https://templatesjungle.gumroad.com/l/free-superclean-cleaning-services-bootstrap-5-html-website-template" target="_blank">Get Pro</a>
              </li>
              <li class="nav-item search-dropdown ms-3 ms-lg-5 dropdown">
                <a class="nav-link p-0 search dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                  <svg class="search" width="24" height="24">
                    <use xlink:href="#search"></use>
                  </svg>
                </a>
                <ul class="dropdown-menu dropdown-menu-end animate slide mt-3 border-0 p-3 shadow">
                  <li class="position-relative d-flex align-items-center p-0">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-primary position-absolute end-0" type="submit">
                      <svg class="search" width="24" height="24">
                        <use xlink:href="#search"></use>
                      </svg>
                    </button>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <section id="our-services" class="text-center mt-5">
    <div class="container">
      <div class="section-title mb-5">
        <p class="mb-2 fs-4 text-capitalize">Services</p>
        <h3>Our Services</h3>
        <p class="fs-4 text-dark w-75 m-auto">At SuperClean, our team of highly trained and skilled cleaning specialists delivers meticulous and well-organized cleaning services to clients.</p>
      </div>
      <div class="row">
        <div class="col-md-4 mb-5 service text-center">
          <img class="rounded-circle mb-4 img-fluid" src="{{asset  ('assetts') }}/images/service1.jpg" alt="img">
          <h6 class="mb-0"><a href="service-single.html">Deep Cleaning</a></h6>
          <p>Our deep cleaning services leave no cranny untouched clean.</p>
        </div>
        <div class="col-md-4 mb-5 service text-center">
          <img class="rounded-circle mb-4 img-fluid" src="{{asset  ('assetts') }}/images/service2.jpg" alt="img">
          <h6 class="mb-0"><a href="service-single.html">Window Cleaning</a></h6>
          <p>Enjoy crystal-clear views with free window cleaning services.</p>
        </div>
        <div class="col-md-4 mb-5 service text-center">
          <img class="rounded-circle mb-4 img-fluid" src="{{asset  ('assetts') }}/images/service3.jpg" alt="img">
          <h6 class="mb-0"><a href="service-single.html">Office Cleaning</a></h6>
          <p>Boost productivity and employee with well-maintained office.</p>
        </div>
        <div class="col-md-4 mb-5 service text-center">
          <img class="rounded-circle mb-4 img-fluid" src="{{asset  ('assetts') }}/images/service4.jpg" alt="img">
          <h6 class="mb-0"><a href="service-single.html">Roof Cleaning</a></h6>
          <p>Create a hygienic workplace commercial cleaning services.</p>
        </div>
        <div class="col-md-4 mb-5 service text-center">
          <img class="rounded-circle mb-4 img-fluid" src="{{asset  ('assetts') }}/images/service5.jpg" alt="img">
          <h6 class="mb-0"><a href="service-single.html">Carpet Cleaning</a></h6>
          <p>Boost productivity and employee with well-maintained office.</p>
        </div>
        <div class="col-md-4 mb-5 service text-center">
          <img class="rounded-circle mb-4 img-fluid" src="{{asset  ('assetts') }}/images/service2.jpg" alt="img">
          <h6 class="mb-0"><a href="service-single.html">Window Cleaning</a></h6>
          <p>Enjoy crystal-clear views with free window cleaning services.</p>
        </div>
        <div class="col-md-4 mb-5 service text-center">
          <img class="rounded-circle mb-4 img-fluid" src="{{asset  ('assetts') }}/images/service2.jpg" alt="img">
          <h6 class="mb-0"><a href="service-single.html">Window Cleaning</a></h6>
          <p>Enjoy crystal-clear views with free window cleaning services.</p>
        </div>
        <div class="col-md-4 mb-5 service text-center">
          <img class="rounded-circle mb-4 img-fluid" src="{{asset  ('assetts') }}/images/service3.jpg" alt="img">
          <h6 class="mb-0"><a href="service-single.html">Office Cleaning</a></h6>
          <p>Boost productivity and employee with well-maintained office.</p>
        </div>
        <div class="col-md-4 mb-5 service text-center">
          <img class="rounded-circle mb-4 img-fluid" src="{{asset  ('assetts') }}/images/service1.jpg" alt="img">
          <h6 class="mb-0"><a href="service-single.html">Deep Cleaning</a></h6>
          <p>Our deep cleaning services leave no cranny untouched clean.</p>
        </div>
      </div>
    </div>
  </section>

  <section id="other-services" class="padding-small margin-medium mb-0" style="background-image: url(images/other-services-bg.jpg); background-size: cover; background-repeat: no-repeat; background-position: center;">
    <div class="container">
      <div class="section-title text-center mb-5">
        <h3>Additional Services</h3>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6 service">
          <div class="price-option mt-3">
            <p><span class="text-primary">✓</span> Quisque rhoncus</p>
            <p><span class="text-primary">✓</span> Lorem ipsum dolor</p>
            <p><span class="text-primary">✓</span> Vivamus velit mir</p>
            <p><span class="text-primary">✓</span> Elit mir ivamus</p>
            <p><span class="text-primary">✓</span> Velit mir</p>
            <p><span class="text-primary">✓</span> Quisque rhoncus</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 service">
          <div class="price-option mt-3">
            <p><span class="text-primary">✓</span> Quisque rhoncus</p>
            <p><span class="text-primary">✓</span> Lorem ipsum dolor</p>
            <p><span class="text-primary">✓</span> Vivamus velit mir</p>
            <p><span class="text-primary">✓</span> Elit mir ivamus</p>
            <p><span class="text-primary">✓</span> Velit mir</p>
            <p><span class="text-primary">✓</span> Quisque rhoncus</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 service">
          <div class="price-option mt-3">
            <p><span class="text-primary">✓</span> Quisque rhoncus</p>
            <p><span class="text-primary">✓</span> Lorem ipsum dolor</p>
            <p><span class="text-primary">✓</span> Vivamus velit mir</p>
            <p><span class="text-primary">✓</span> Elit mir ivamus</p>
            <p><span class="text-primary">✓</span> Velit mir</p>
            <p><span class="text-primary">✓</span> Quisque rhoncus</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 service">
          <div class="price-option mt-3">
            <p><span class="text-primary">✓</span> Quisque rhoncus</p>
            <p><span class="text-primary">✓</span> Lorem ipsum dolor</p>
            <p><span class="text-primary">✓</span> Vivamus velit mir</p>
            <p><span class="text-primary">✓</span> Elit mir ivamus</p>
            <p><span class="text-primary">✓</span> Velit mir</p>
            <p><span class="text-primary">✓</span> Quisque rhoncus</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="testimonial" class="padding-medium">
    <div class="container">
      <div class="section-title text-center mb-5">
        <p class="mb-2 fs-4 text-capitalize">Our Reviews</p>
        <h3>What Our Clients Says</h3>
      </div>
      <div class="align-items-center">
        <div class="review-content">
          <div class="swiper testimonial-swiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="review-item">
                  <div class="review bg-gray border rounded-3 p-4">
                    <div class="review-star d-flex mb-2">
                      <svg class="star me-1 text-warning" width="16" height="16">
                        <use xlink:href="#star" />
                      </svg>                      
                      <svg class="star me-1 text-warning" width="16" height="16">
                        <use xlink:href="#star" />
                      </svg>                      
                      <svg class="star me-1 text-warning" width="16" height="16">
                        <use xlink:href="#star" />
                      </svg>                      
                      <svg class="star me-1 text-warning" width="16" height="16">
                        <use xlink:href="#star" />
                      </svg>                      
                      <svg class="star me-1 text-warning" width="16" height="16">
                        <use xlink:href="#star" />
                      </svg>                      
                    </div>
                    <blockquote class="mb-0">
                    <p class="mb-0">“A pellen tesque pretium feugiat vel mobi sagittis lorem habi tasse cursus ipsum quis nec eget facilisis. Quis nibh ut bindum nisl quis placerat proin tortor mattis.”</p>
                    </blockquote>
                  </div>
                  <div class="author-detail mt-4 d-flex align-items-center">
                    <img class="img-fluid me-3" src="{{asset  ('assetts') }}/images/reviewer1.jpg" alt="reviewer">
                    <div class="author-text">
                      <h6 class="name mb-0">James Rodrigo</h6>
                      <span class="time text-capitalize">2 months ago</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="review-item">
                  <div class="review bg-gray border rounded-3 p-4">
                    <div class="review-star d-flex mb-2">
                      <svg class="star me-1 text-warning" width="16" height="16">
                        <use xlink:href="#star" />
                      </svg>                      
                      <svg class="star me-1 text-warning" width="16" height="16">
                        <use xlink:href="#star" />
                      </svg>                      
                      <svg class="star me-1 text-warning" width="16" height="16">
                        <use xlink:href="#star" />
                      </svg>                      
                      <svg class="star me-1 text-warning" width="16" height="16">
                        <use xlink:href="#star" />
                      </svg>                      
                      <svg class="star me-1 text-warning" width="16" height="16">
                        <use xlink:href="#star" />
                      </svg>                      
                    </div>
                    <blockquote class="mb-0">
                    <p class="mb-0">“A pellen tesque pretium feugiat vel mobi sagittis lorem habi tasse cursus ipsum quis nec eget facilisis. Quis nibh ut bindum nisl quis placerat proin tortor mattis.”</p>
                    </blockquote>
                  </div>
                  <div class="author-detail mt-4 d-flex align-items-center">
                    <img class="img-fluid me-3" src="{{asset  ('assetts') }}/images/reviewer2.jpg" alt="reviewer">
                    <div class="author-text">
                      <h6 class="name mb-0">Sarah anderson</h6>
                      <span class="time text-capitalize">2 months ago</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="review-item">
                  <div class="review bg-gray border rounded-3 p-4">
                    <div class="review-star d-flex mb-2">
                      <svg class="star me-1 text-warning" width="16" height="16">
                        <use xlink:href="#star" />
                      </svg>                      
                      <svg class="star me-1 text-warning" width="16" height="16">
                        <use xlink:href="#star" />
                      </svg>                      
                      <svg class="star me-1 text-warning" width="16" height="16">
                        <use xlink:href="#star" />
                      </svg>                      
                      <svg class="star me-1 text-warning" width="16" height="16">
                        <use xlink:href="#star" />
                      </svg>                      
                      <svg class="star me-1 text-warning" width="16" height="16">
                        <use xlink:href="#star" />
                      </svg>                      
                    </div>
                    <blockquote class="mb-0">
                    <p class="mb-0">“A pellen tesque pretium feugiat vel mobi sagittis lorem habi tasse cursus ipsum quis nec eget facilisis. Quis nibh ut bindum nisl quis placerat proin tortor mattis.”</p>
                    </blockquote>
                  </div>
                  <div class="author-detail mt-4 d-flex align-items-center">
                    <img class="img-fluid me-3" src="{{asset  ('assetts') }}/images/reviewer3.jpg" alt="reviewer">
                    <div class="author-text">
                      <h6 class="name mb-0">Kelly Garcia</h6>
                      <span class="time text-capitalize">2 months ago</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="review-item">
                  <div class="review bg-gray border rounded-3 p-4">
                    <div class="review-star d-flex mb-2">
                      <svg class="star me-1 text-warning" width="16" height="16">
                        <use xlink:href="#star" />
                      </svg>                      
                      <svg class="star me-1 text-warning" width="16" height="16">
                        <use xlink:href="#star" />
                      </svg>                      
                      <svg class="star me-1 text-warning" width="16" height="16">
                        <use xlink:href="#star" />
                      </svg>                      
                      <svg class="star me-1 text-warning" width="16" height="16">
                        <use xlink:href="#star" />
                      </svg>                      
                      <svg class="star me-1 text-warning" width="16" height="16">
                        <use xlink:href="#star" />
                      </svg>                      
                    </div>
                    <blockquote class="mb-0">
                    <p class="mb-0">“A pellen tesque pretium feugiat vel mobi sagittis lorem habi tasse cursus ipsum quis nec eget facilisis. Quis nibh ut bindum nisl quis placerat proin tortor mattis.”</p>
                    </blockquote>
                  </div>
                  <div class="author-detail mt-4 d-flex align-items-center">
                    <img class="img-fluid me-3" src="{{asset  ('assetts') }}/images/reviewer1.jpg" alt="reviewer">
                    <div class="author-text">
                      <h6 class="name mb-0">James Rodrigo</h6>
                      <span class="time text-capitalize">2 months ago</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-pagination position-relative pt-5"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="quote" class="bg-gray padding-small margin-medium mt-0">
    <div class="container text-center">
      <div class="section-title">
        <h3>Request a free quote</h3>
      </div>
      <form class="contact-form row mt-5">
        <div class="col-lg-6 col-md-12 col-sm-12 mb-4">
          <input type="text" name="name" placeholder="Full Name" class="w-100 border ps-4 rounded-3">
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 mb-4">
          <input type="email" name="email" placeholder="Email" class="w-100 border ps-4 rounded-3">
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 mb-4">
          <input type="text" name="phone" placeholder="Phone" class="w-100 border ps-4 rounded-3">
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 mb-4">
          <input type="text" name="city" placeholder="City" class="w-100 border ps-4 rounded-3">
        </div>
        <div class="col-md-12 col-sm-12 mb-4">
          <input type="text" name="property" placeholder="Property Address" class="w-100 border ps-4 rounded-3">
        </div>
        <div class="col-md-12 col-sm-12 mb-4">
          <select class="form-select focus-transparent w-100 border rounded-3 ps-4" aria-invalid="false"
            name="choose">
            <option value="Select Your Service">Interested In</option>
            <option value="Service">Deep Cleaning</option>
            <option value="Service">Window Cleaning</option>
            <option value="Service">Office Cleaning</option>
            <option value="Service">Roof Cleaning</option>
            <option value="Service">Carpet Cleaning</option>
          </select>
        </div>
        <div class="col-md-12 col-sm-12 mb-4">
          <textarea class="w-100 border p-3 ps-4 rounded-3" type="text" name="details" placeholder="Details"></textarea>
        </div>
      </form>
      <a href="#" class="btn btn-medium btn-primary btn-pill mt-3 text-uppercase">Submit</a>
    </div>
  </section>

  <section id="blogs">
    <div class="container">
      <div class="mb-5 d-flex flex-wrap align-items-center justify-content-between">
        <div class="section-title">
          <p class="mb-2 fs-4 text-capitalize">Blogs</p>
          <h3>News & Articles</h3>
        </div>
        <a href="blog.html" class="btn btn-medium btn-primary btn-pill mt-3 text-uppercase">Read all Blogs</a>
      </div>
      <div class="post-grid row mt-4">
        <div class="col-lg-4 col-md-6 col-sm-12 mb-5">
          <div class="card-item">
            <div class="card border-0 bg-transparent">
              <div class="card-image position-relative">
                <img src="{{asset  ('assetts') }}/images/post-item1.jpg" alt="post-img" class="post-image img-fluid rounded-3">
              </div>
            </div>
            <div class="card-body p-0 mt-2">
              <h6 class="mt-3">
                <a href="blog-single.html">Why are we best cleaning company</a>
              </h6>
              <p>Elit adipi massa diam in dignissim. Sagittis pulvinar ut dis venenatis nunc nunc vitae aliquam vestibu adipi massa diamlum... <a href="blog-single.html" class="text-decoration-underline"><em>Read more</em></a>
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 mb-5">
          <div class="card-item">
            <div class="card border-0 bg-transparent">
              <div class="card-image position-relative">
                <img src="{{asset  ('assetts') }}/images/post-item2.jpg" alt="post-img" class="post-image img-fluid rounded-3">
              </div>
            </div>
            <div class="card-body p-0 mt-2">
              <h6 class="mt-3">
                <a href="blog-single.html">Top 10 best cleaning services</a>
              </h6>
              <p>Sagittis pulvinar ut dis venenatis nunc nunc vitae aliquam vestibulum. Elit adipi massa diam in dignissim... <a href="blog-single.html" class="text-decoration-underline"><em>Read more</em></a>
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 mb-5">
          <div class="card-item">
            <div class="card border-0 bg-transparent">
              <div class="card-image position-relative">
                <img src="{{asset  ('assetts') }}/images/post-item3.jpg" alt="post-img" class="post-image img-fluid rounded-3">
              </div>
            </div>
            <div class="card-body p-0 mt-2">
              <h6 class="mt-3">
                <a href="blog-single.html">Best vacuum cleaners in 2023</a>
              </h6>
              <p>Pulvinar sagittis ut dis venenatis nunc nunc vitae aliquam vestibulum. Elit adipi massa diam in dignissim... <a href="blog-single.html" class="text-decoration-underline"><em>Read more</em></a>
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 mb-5">
          <div class="card-item">
            <div class="card border-0 bg-transparent">
              <div class="card-image position-relative">
                <img src="{{asset  ('assetts') }}/images/post-item4.jpg" alt="post-img" class="post-image img-fluid rounded-3">
              </div>
            </div>
            <div class="card-body p-0 mt-2">
              <h6 class="mt-3">
                <a href="blog-single.html">Kitchen cleaning services</a>
              </h6>
              <p>Sagittis pulvinar ut dis venenatis nunc nunc vitae aliquam vestibulum. Elit adipi massa diam in dignissim... <a href="blog-single.html" class="text-decoration-underline"><em>Read more</em></a>
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 mb-5">
          <div class="card-item">
            <div class="card border-0 bg-transparent">
              <div class="card-image position-relative">
                <img src="{{asset  ('assetts') }}/images/post-item5.jpg" alt="post-img" class="post-image img-fluid rounded-3">
              </div>
            </div>
            <div class="card-body p-0 mt-2">
              <h6 class="mt-3">
                <a href="blog-single.html">we are Best cleaners for your window</a>
              </h6>
              <p>Pulvinar sagittis ut dis venenatis nunc nunc vitae aliquam vestibulum. Elit adipi massa diam in dignissim... <a href="blog-single.html" class="text-decoration-underline"><em>Read more</em></a>
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 mb-5">
          <div class="card-item">
            <div class="card border-0 bg-transparent">
              <div class="card-image position-relative">
                <img src="{{asset  ('assetts') }}/images/post-item6.jpg" alt="post-img" class="post-image img-fluid rounded-3">
              </div>
            </div>
            <div class="card-body p-0 mt-2">
              <h6 class="mt-3">
                <a href="blog-single.html">Top 10 ways to keep city clean</a>
              </h6>
              <p>Elit adipi massa diam in dignissim. Sagittis pulvinar ut dis venenatis nunc nunc vitae aliquam vestibu adipi massa diamlum... <a href="blog-single.html" class="text-decoration-underline"><em>Read more</em></a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="faqs" class="bg-gray padding-small margin-medium mb-0">
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2 accordion" id="accordion">
          <div class="accordion-item border-0 rounded-3 mb-3">
            <h5 class="text-capitalize fw-regular accordion-header">
              <button
              class="accordion-button bg-transparent focus-transparent text-capitalize shadow-none"
                type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                aria-controls="collapseOne">
                What areas do you serve ?
              </button>
            </h5>
            <div id="collapseOne" class="accordion-collapse border-0 collapse show" data-bs-parent="#accordion">
              <div class="accordion-body pt-0">
                <p>SuperCleanPro Services operates in your place. We proudly serve both residential and commercial properties within this area, delivering top-quality cleaning solutions to our valued customers.</p>
              </div>
            </div>
          </div>
          <div class="accordion-item border-0 rounded-3 mb-3">
            <h5 class="text-capitalize fw-regular accordion-header">
              <button
                class="accordion-button bg-transparent collapsed focus-transparent text-capitalize shadow-none"
                type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                aria-controls="collapseTwo">
                Are your cleaning technicians trained and insured ?
              </button>
            </h5>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordion">
              <div class="accordion-body pt-0">
                <p>SuperCleanPro Services operates in your place. We proudly serve both residential and commercial properties within this area, delivering top-quality cleaning solutions to our valued customers.</p>
              </div>
            </div>
          </div>
          <div class="accordion-item border-0 rounded-3 mb-3">
            <h5 class="text-capitalize fw-regular accordion-header">
              <button
                class="accordion-button bg-transparent collapsed focus-transparent text-capitalize shadow-none"
                type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                aria-controls="collapseThree">
                What cleaning products do you use ?
              </button>
            </h5>
            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordion">
              <div class="accordion-body pt-0">
                <p>SuperCleanPro Services operates in your place. We proudly serve both residential and commercial properties within this area, delivering top-quality cleaning solutions to our valued customers.</p>
              </div>
            </div>
          </div>
          <div class="accordion-item border-0 rounded-3 mb-3">
            <h5 class="text-capitalize fw-regular accordion-header">
              <button
                class="accordion-button bg-transparent collapsed focus-transparent text-capitalize shadow-none"
                type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                aria-controls="collapseFour">
                How do you determine pricing for your services ?
              </button>
            </h5>
            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordion">
              <div class="accordion-body pt-0">
                <p>SuperCleanPro Services operates in your place. We proudly serve both residential and commercial properties within this area, delivering top-quality cleaning solutions to our valued customers.</p>
              </div>
            </div>
          </div>
          <div class="accordion-item border-0 rounded-3 mb-3">
            <h5 class="text-capitalize fw-regular accordion-header">
              <button
                class="accordion-button bg-transparent collapsed focus-transparent text-capitalize shadow-none"
                type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false"
                aria-controls="collapseFive">
                Do I need to provide cleaning equipment and supplies ?
              </button>
            </h5>
            <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordion">
              <div class="accordion-body pt-0">
                <p>SuperCleanPro Services operates in your place. We proudly serve both residential and commercial properties within this area, delivering top-quality cleaning solutions to our valued customers.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-2">          
        </div>
      </div>
    </div>
  </section>

  <section id="contact-info" class="py-5 bg-accent-gradient">
    <div class="container">
      <div class="row">
        <div class="col-md-4 d-flex align-items-center">
          <svg class="star me-1 light-blue-color" width="90" height="90">
            <use xlink:href="#call-chat-rounded-outline" />
          </svg>
          <div class="contact-info-text ms-3">
            <h5 class="text-light mb-0">Give Us Call</h5>
            <h5 class="fw-light text-light">123 456 7891</h5>
          </div>
        </div>
        <div class="col-md-4 d-flex align-items-center">
          <svg class="star me-1 light-blue-color" width="90" height="90">
            <use xlink:href="#point-on-map-outline" />
          </svg>
          <div class="contact-info-text ms-3">
            <h5 class="text-light mb-0">Phoenix, Arizona</h5>
            <h5 class="fw-light text-light">947 Dogwood Road</h5>
          </div>
        </div>
        <div class="col-md-4 d-flex align-items-center">
          <svg class="star me-1 light-blue-color" width="90" height="90">
            <use xlink:href="#pen-new-round-outline" />
          </svg>
          <div class="contact-info-text ms-3">
            <h5 class="text-light mb-0">free quote</h5>
            <h5 class="fw-light text-light text-decoration-underline"><a href="quote.html">Request quote</a></h5>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer id="footer">
    <div class="container padding-medium pb-5">
      <div class="row flex-wrap justify-content-between">
        <div class="col-lg-3 col-md-6 col-sm-6 pb-3">
          <div class="footer-menu">
            <h6 class="widget-title pb-2 fw-semibold">Super Clean</h6>
            <ul class="menu-list d-flex flex-column list-unstyled">
              <li class="pb-2">
                <a href="about.html">About Us</a>
              </li>
              <li class="pb-2">
                <a href="team.html">Our Team</a>
              </li>
              <li class="pb-2">
                <a href="services.html">Our Services</a>
              </li>
              <li class="pb-2">
                <a href="about.html">Why choose us</a>
              </li>
              <li class="pb-2">
                <a href="contact.html">Contact Us</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 pb-3">
          <div class="footer-menu">
            <h6 class="widget-title pb-2 fw-semibold">Services</h6>
            <ul class="menu-list d-flex flex-column list-unstyled">
              <li class="pb-2">
                <a href="service-single.html">Deep cleaning</a>
              </li>
              <li class="pb-2">
                <a href="service-single.html">Window cleaning</a>
              </li>
              <li class="pb-2">
                <a href="service-single.html">Office cleaning</a>
              </li>
              <li class="pb-2">
                <a href="service-single.html">Roof cleaning</a>
              </li>
              <li class="pb-2">
                <a href="service-single.html">Carpet cleaning</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 pb-3">
          <div class="footer-menu">
            <h6 class="widget-title pb-2 fw-semibold">Help</h6>
            <ul class="menu-list d-flex flex-column list-unstyled">
              <li class="pb-2">
                <a href="faq.html">FAQs</a>
              </li>
              <li class="pb-2">
                <a href="contact.html">Get in touch</a>
              </li>
              <li class="pb-2">
                <a href="about.html">Info</a>
              </li>
              <li class="pb-2">
                <a href="#">Privacy Policy</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 pb-3">
          <div class="footer-menu">
            <h6 class="widget-title pb-2 fw-semibold">Book your service</h6>
            <p>Get best dedicated team of professionals for your service.</p>
            <a class="btn btn-primary" href="booking.html">Book Service</a>
            <h5 class="text-capitalize fw-light mt-3">Call Us: <a class="fw-semibold text-black" href="#">123 456 7891</a> </h5>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-gray">
      <div class="container footer-bottom d-md-flex text-center justify-content-between py-4">
        <p class="mb-0">© 2024 SuperClean - All rights reserved</p>
        <p class="mb-0">Free HTML Templates by: <a href="https://templatesjungle.com/" target="_blank" class="text-decoration-underline fw-semibold"> TemplatesJungle</a></p>
      </div>
    </div>
  </footer>

<!-- Scripts -->
<script src="{{ asset('assetts/js/jquery-1.11.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assetts/js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assetts/js/plugins.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script type="text/javascript" src="{{ asset('assetts/js/script.js') }}"></script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>