​​<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
      xmlns:o="urn:schemas-microsoft-com:office:office" class="dj_webkit dj_chrome dj_contentbox">
<head>
    <!-- NAME: SOFT -->
    <!--[if gte mso 15]>
    <xml>
        ​​ <o:OfficeDocumentSettings>
        <o:AllowPNG/>
        <o:PixelsPerInch>96</o:PixelsPerInch>
    </o:OfficeDocumentSettings>
    </xml>
    <![endif]-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('')</title>

    <style type="text/css">
        p {
            margin: 10px 0;
            padding: 0;
        }

        table {
            border-collapse: collapse;
        }

        h1, h2, h3, h4, h5, h6 {
            display: block;
            margin: 0;
            padding: 0;
        }

        img, a img {
            border: 0;
            height: auto;
            outline: none;
            text-decoration: none;
        }

        body, #bodyTable, #bodyCell {
            height: 100%;
            margin: 0;
            padding: 0;
            width: 100%;
        }

        #outlook a {
            padding: 0;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        table {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        .ReadMsgBody {
            width: 100%;
        }

        .ExternalClass {
            width: 100%;
        }

        p, a, li, td, blockquote {
            mso-line-height-rule: exactly;
        }

        a[href^=tel], a[href^=sms] {
            color: inherit;
            cursor: default;
            text-decoration: none;
        }

        p, a, li, td, body, table, blockquote {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        .ExternalClass, .ExternalClass p, .ExternalClass td, .ExternalClass div, .ExternalClass span, .ExternalClass font {
            line-height: 100%;
        }

        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        a.mcnButton {
            display: block;
        }

        .mcnImage {
            vertical-align: bottom;
        }

        .mcnTextContent {
            word-break: break-word;
        }

        .mcnTextContent img {
            height: auto !important;
        }

        .mcnDividerBlock {
            table-layout: fixed !important;
        }

        body, #bodyTable, #templateFooter {
            background-color: #EDF1F3;
        }

        #bodyCell {
            border-top: 0;
        }

        h1 {
            color: #00535E !important;
            font-family: Helvetica;
            font-size: 26px;
            font-style: normal;
            font-weight: normal;
            line-height: 125%;
            letter-spacing: normal;
            text-align: left;
        }

        h2 {
            color: #404448 !important;
            font-family: Helvetica;
            font-size: 20px;
            font-style: normal;
            font-weight: bold;
            line-height: 125%;
            letter-spacing: normal;
            text-align: left;
        }

        h3 {
            color: #404448 !important;
            font-family: Helvetica;
            font-size: 18px;
            font-style: normal;
            font-weight: bold;
            line-height: 125%;
            letter-spacing: normal;
            text-align: left;
        }

        h4 {
            color: #404448 !important;
            font-family: Helvetica;
            font-size: 16px;
            font-style: normal;
            font-weight: bold;
            line-height: 125%;
            letter-spacing: normal;
            text-align: left;
        }

        #templatePreheader {
            background-color: #FFFFFF;
            border-top: 0;
            border-bottom: 1px solid #E3E5E6;
        }

        .preheaderContainer .mcnTextContent, .preheaderContainer .mcnTextContent p {
            color: #ABB0B3;
            font-family: Helvetica;
            font-size: 12px;
            line-height: 125%;
            text-align: left;
        }

        .preheaderContainer .mcnTextContent a {
            color: #ABB0B3;
            font-weight: normal;
            text-decoration: underline;
        }

        #templateHeader {
            background-color: #EDF1F3;
            border-top: 0;
            border-bottom: 0;
        }

        .headerContainer .mcnTextContent, .headerContainer .mcnTextContent p {
            color: #ABB0B3;
            font-family: Helvetica;
            font-size: 18px;
            line-height: 150%;
            text-align: center;
        }

        .headerContainer .mcnTextContent a {
            color: #ABB0B3;
            font-weight: normal;
            text-decoration: underline;
        }

        #templateBody {
            background-color: #EDF1F3;
            border-top: 0;
            border-bottom: 0;
        }

        #bodyBackground {
            border-collapse: separate !important;
            background-color: #FFFFFF;
            border: 1px solid #E3E5E6;
            border-radius: 6px;
        }

        .bodyContainer .mcnTextContent, .bodyContainer .mcnTextContent p {
            color: #ABB0B3;
            font-family: Helvetica;
            font-size: 18px;
            line-height: 150%;
            text-align: left;
        }

        .bodyContainer .mcnTextContent a {
            color: #404448;
            font-weight: normal;
            text-decoration: underline;
        }

        .footerContainer .mcnTextContent, .footerContainer .mcnTextContent p {
            color: #ABB0B3;
            font-family: Helvetica;
            font-size: 12px;
            line-height: 125%;
            text-align: center;
        }

        .footerContainer .mcnTextContent a {
            color: #ABB0B3;
            font-weight: normal;
            text-decoration: underline;
        }

        @media only screen and (max-width: 480px) {
            body, table, td, p, a, li, blockquote {
                -webkit-text-size-adjust: none !important;
            }

        }

        @media only screen and (max-width: 480px) {
            body {
                width: 100% !important;
                min-width: 100% !important;
            }

        }

        @media only screen and (max-width: 480px) {
            .templateContainer {
                max-width: 600px !important;
                width: 100% !important;
            }

        }

        @media only screen and (max-width: 480px) {
            .mcnImage {
                height: auto !important;
                width: 100% !important;
            }

        }

        @media only screen and (max-width: 480px) {
            .mcnCartContainer, .mcnCaptionTopContent, .mcnRecContentContainer, .mcnCaptionBottomContent, .mcnTextContentContainer, .mcnBoxedTextContentContainer, .mcnImageGroupContentContainer, .mcnCaptionLeftTextContentContainer, .mcnCaptionRightTextContentContainer, .mcnCaptionLeftImageContentContainer, .mcnCaptionRightImageContentContainer, .mcnImageCardLeftTextContentContainer, .mcnImageCardRightTextContentContainer {
                max-width: 100% !important;
                width: 100% !important;
            }

        }

        @media only screen and (max-width: 480px) {
            .mcnBoxedTextContentContainer {
                min-width: 100% !important;
            }

        }

        @media only screen and (max-width: 480px) {
            .mcnImageGroupContent {
                padding: 9px !important;
            }

        }

        @media only screen and (max-width: 480px) {
            .mcnCaptionLeftContentOuter .mcnTextContent, .mcnCaptionRightContentOuter .mcnTextContent {
                padding-top: 9px !important;
            }

        }

        @media only screen and (max-width: 480px) {
            .mcnImageCardTopImageContent, .mcnCaptionBlockInner .mcnCaptionTopContent:last-child .mcnTextContent {
                padding-top: 18px !important;
            }

        }

        @media only screen and (max-width: 480px) {
            .mcnImageCardBottomImageContent {
                padding-bottom: 9px !important;
            }

        }

        @media only screen and (max-width: 480px) {
            .mcnImageGroupBlockInner {
                padding-top: 0 !important;
                padding-bottom: 0 !important;
            }

        }

        @media only screen and (max-width: 480px) {
            .mcnImageGroupBlockOuter {
                padding-top: 9px !important;
                padding-bottom: 9px !important;
            }

        }

        @media only screen and (max-width: 480px) {
            .mcnTextContent, .mcnBoxedTextContentColumn {
                padding-right: 18px !important;
                padding-left: 18px !important;
            }

        }

        @media only screen and (max-width: 480px) {
            .mcnImageCardLeftImageContent, .mcnImageCardRightImageContent {
                padding-right: 18px !important;
                padding-bottom: 0 !important;
                padding-left: 18px !important;
            }

        }

        @media only screen and (max-width: 480px) {
            .mcpreview-image-uploader {
                display: none !important;
                width: 100% !important;
            }

        }

        @media only screen and (max-width: 480px) {
            h1 {
                font-size: 24px !important;
                line-height: 125% !important;
            }

        }

        @media only screen and (max-width: 480px) {
            h2 {
                font-size: 20px !important;
                line-height: 125% !important;
            }

        }

        @media only screen and (max-width: 480px) {
            h3 {
                font-size: 18px !important;
                line-height: 125% !important;
            }

        }

        @media only screen and (max-width: 480px) {
            h4 {
                font-size: 16px !important;
                line-height: 125% !important;
            }

        }

        @media only screen and (max-width: 480px) {
            .mcnBoxedTextContentContainer .mcnTextContent, .mcnBoxedTextContentContainer .mcnTextContent p {
                font-size: 18px !important;
                line-height: 125% !important;
            }

        }

        @media only screen and (max-width: 480px) {
            #templatePreheader {
                display: block !important;
            }

        }

        @media only screen and (max-width: 480px) {
            .preheaderContainer .mcnTextContent, .preheaderContainer .mcnTextContent p {
                font-size: 14px !important;
                line-height: 115% !important;
            }

        }

        @media only screen and (max-width: 480px) {
            .headerContainer .mcnTextContent, .headerContainer .mcnTextContent p {
                font-size: 18px !important;
                line-height: 125% !important;
            }

        }

        @media only screen and (max-width: 480px) {
            .bodyContainer .mcnTextContent, .bodyContainer .mcnTextContent p {
                font-size: 18px !important;
                line-height: 125% !important;
            }

        }

        @media only screen and (max-width: 480px) {
            .footerContainer .mcnTextContent, .footerContainer .mcnTextContent p {
                font-size: 14px !important;
                line-height: 115% !important;
            }

        }</style>
    <link rel="stylesheet" type="text/css"
          href="https://us11.admin.mailchimp.com/release/11.5.17/css/preview-layout.css">
    {{--<script type="text/javascript">--}}
        {{--var xhr_open = XMLHttpRequest.prototype.open;--}}
        {{--XMLHttpRequest.prototype.open = function (method, url, async, user, password) {--}}
            {{--xhr_open.call(this, method, url, async, user, password);--}}
            {{--if (async === true && url.match(/^\/(?!\/)+/)) {--}}
                {{--this.setRequestHeader('X-CSRF-Token', '334df4e74c4564edea337001d14223e09a5fe596');--}}
            {{--}--}}
        {{--}--}}
    {{--</script>--}}

    <script src="/release/11.5.17/js/dojo/dojo.js"
            data-dojo-config="parseOnLoad: true, usePlainJson: true, isDebug: false"></script>
    <script src="/release/11.5.17/js/dojo/mccommon.js"></script>

    <script type="text/javascript">
        require(["mojo/widgets/Notifications"]);
    </script>
    <script>var defaultBlocks = ({
            "header_container": [{
                "type": "image",
                "data": {
                    "image": {
                        "alt": "",
                        // "src": "http:\/\/gallery.mailchimp.com\/27aac8a65e64c994c4416d6b8\/images\/yoga_logo.png",
                        "width": 185,
                        "height": 70,
                    }, "edgeToEdge": false, "align": "left"
                }
            }],
            "body_container": [{
                "type": "text",
                "data": {"content": ["\u003Ch1\u003ENew Year, \u003Cstrong\u003ENew You\u003C\/strong\u003E\u003C\/h1\u003E\u003Ch3\u003E50% off all massage packages in January\u003C\/h3\u003E"]}
            }, {
                "type": "text",
                "data": {"content": ["The new year is a time for reflection, resolutions, and turning over a new leaf. At Peaceful Lotus, we want to encourage restorative behavior in all its forms, which is why we're offering 50% off all classes in January.\u003Cbr \/\u003E\u003Cbr \/\u003E"]}
            }, {
                "type": "image",
                "data": {
                    "image": {
                        "alt": "",
                        // "src": "http:\/\/gallery.mailchimp.com\/27aac8a65e64c994c4416d6b8\/images\/yogapose.1.jpg",
                        "width": '100%',
                        "height": 385,
                    }, "edgeToEdge": true, "align": "center"
                }
            }, {
                "type": "text",
                "data": {"content": ["\u003Cstrong\u003EA new year means a new you.\u003C\/strong\u003E Start if off right; don't miss out on all our yoga options&mdash;half off for one month only."]}
            }, {
                "type": "button",
                "data": {
                    "buttonText": "SIGN UP NOW",
                    "align": "left",
                    "buttonWidth": "",
                    "styles": [{
                        "name": "Button Style",
                        "selector": ".mcnButtonContentContainer",
                        "props": {
                            "border-radius": {"value": "3px", "important": false},
                            "background-color": {"value": "#A1CEC4", "important": false}
                        }
                    }, {
                        "name": "Button Text",
                        "selector": ".mcnButtonContent",
                        "props": {
                            "color": {
                                "value": "#FFFFFF",
                                "selector": ".mcnButtonContent .mcnButton",
                                "important": false
                            },
                            "font-family": {"value": "Arial", "important": false},
                            "font-size": {"value": "12px", "important": false},
                            "padding": {"value": "12px", "important": false}
                        }
                    }],
                    "link": {
                        "href": "http:\/\/",
                        "text": "http:\/\/",
                        "attrs": {"class": "", "title": "", "target": "_self"}
                    }
                }
            }, {
                "type": "divider",
                "data": {
                    "styles": [{
                        "name": "Divider Style",
                        "selector": ".mcnDividerBlockInner",
                        "props": {
                            "padding-top": {"value": "18px", "important": false},
                            "padding-bottom": {"value": "36px", "important": false},
                            "border-top": {
                                "value": "1px solid #E3E5E6",
                                "selector": ".mcnDividerContent",
                                "important": false
                            }
                        }
                    }]
                }
            }],
            "footer_container": [{"type": "footer"}]
        });
        dojo.require("mojo.neapolitan.TemplatePreview");</script>
</head>
<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0"
      style="height: 100%;margin: 0;padding: 0;width: 100%;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #EDF1F3;">
<table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable"
       style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;height: 100%;margin: 0;padding: 0;width: 100%;background-color: #EDF1F3;">
    <tbody>
    <tr>
        <td align="center" valign="top" id="bodyCell"
            style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;height: 100%;margin: 0;padding: 0;width: 100%;border-top: 0;">
            <!-- BEGIN TEMPLATE // -->
            <table border="0" cellpadding="0" cellspacing="0" width="100%"
                   style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                <tbody>
                <tr>
                    <td align="center" valign="top"
                        style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">

                    </td>
                </tr>
                <tr>
                    <td align="center" valign="top"
                        style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                        <!-- BEGIN BODY // -->
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateBody"
                               style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #EDF1F3;border-top: 0;border-bottom: 0;">
                            <tbody>
                            <tr>
                                <td align="center" valign="top" class="mobilePaddingRL5"
                                    style="padding-top: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%"
                                           id="bodyBackground" class="templateContainer"
                                           style="border-collapse: separate !important;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #FFFFFF;border: 1px solid #E3E5E6;border-radius: 6px;">
                                        <tbody>
                                        <tr>
                                            <td align="center" valign="top"
                                                style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%"
                                                       style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                                    <tbody>
                                                    <tr>
                                                        <td valign="top" class="bodyContainer"
                                                            style="padding-top: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;"
                                                            mc:container="body_container"
                                                            mccontainer="body_container">

                                                            <table border="0" cellpadding="0" cellspacing="0"
                                                                   width="100%" class="mcnTextBlock"
                                                                   style="min-width:100%;">
                                                                <tbody class="mcnTextBlockOuter">
                                                                <tr>
                                                                    <td valign="top" class="mcnTextBlockInner"
                                                                        style="padding-top:9px;">
                                                                        <!--[if mso]>
                                                                        <table align="left" border="0"
                                                                               cellspacing="0" cellpadding="0"
                                                                               width="100%" style="width:100%;">
                                                                            <tr>
                                                                        <![endif]-->

                                                                        <!--[if mso]>
                                                                        <td valign="top" width="800"
                                                                            style="width:598px;">
                                                                        <![endif]-->
                                                                        <table align="left" border="0"
                                                                               cellpadding="0" cellspacing="0"
                                                                               style="max-width:100%; min-width:100%;"
                                                                               width="100%"
                                                                               class="mcnTextContentContainer">
                                                                            <tbody>
                                                                            <tr>

                                                                                <td valign="top"
                                                                                    style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                                                                                    @yield('content')
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <!--[if mso]>
                                                                        </td>
                                                                        <![endif]-->

                                                                        <!--[if mso]>
                                                                        </tr>
                                                                        </table>
                                                                        <![endif]-->
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- // END BODY -->
                    </td>
                </tr>
                </tbody>
            </table>
            <!-- // END TEMPLATE -->
        </td>
    </tr>
    </tbody>
</table>

</body>
</html>​