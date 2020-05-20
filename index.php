<?php

include "token.php";

class AdRequest extends Token {

    public function __construct($adType, $type) {
        $this->adType = $adType;
        $this->type   = $type;
        parent::__construct();
    }

}

//RAVI PATEL : 2020-05-20 : FORMATTING ARRAY IN HTML
echo '<pre>';
$adType   = 2;
$type     = 'single_ad';
$response = '{"title":"NativeTestAd","objective":"1","campaignid":79830,"ctaText":"Watch Video","linkUrl":"","linkFallback":"https://www.jio.com?trnid=5364.C12_484224_05f6e772","desc":"","rating":"","downloads":"","price":"","imageIcon":"https://jioads.akamaized.net/i/80x80_e/eba585e38839d752ce29750623dc63b9.jpeg?5364.C12_484224_05f6e772_A-AN-3.15.8","imageMain":"https://jioads.akamaized.net/i/1200x627_e/eba585e38839d752ce29750623dc63b9.jpeg?5364.C12_484224_05f6e772_A-AN-3.15.8","imageMedium":"","imageBanner": "","imageTile":"","additionalCreatives":{"240x260":"https://jioads.akamaized.net/i/240x260_e/eba585e38839d752ce29750623dc63b9.jpeg?5364.C12_484224_05f6e772_A-AN-3.15.8","320x184":"https://jioads.akamaized.net/i/320x184_e/eba585e38839d752ce29750623dc63b9.jpeg?5364.C12_484224_05f6e772_A-AN-3.15.8"},"video":"VMAX</AdSystem>00:00:30</Duration></Tracking></Tracking></Tracking></Tracking></Tracking></Tracking></Tracking></Tracking></Tracking></TrackingEvents></MediaFile></MediaFiles></Linear></Creative></Creatives></InLine></Ad></VAST>","audio":"","sponsored":"","desc2":"NativeTestAd","likes":"","salePrice":"","phone":"","address":"","displayUrl":"","impTrackers":["https://jioads.akamaized.net/tracking/i.gif?b=484224&c=79830&zoneid=5364&cb=05f6e772&ufc=&zae=2&bfm=0&ml=native&tm=0&mn=Jio+Ads+Demo+3.14.8&vr=A-AN-3.15.8&sw=1080&sh=2076&cnt=12&mser=cdn&vuid=I3c8759e0-050c-49d3-ba77-5b70dfea12c7&dat=5&dacp=2&advid=3c8759e0-050c-49d3-ba77-5b70dfea12c7&zt=a&sa=4&dd=0&pid=79830&app=1&ca=4&sp=&ai=com.jio.test&fca=1&fcva=2&cpmt=0&cpct=0&cpat=0&cpcvt=0&pb=0.25%7C0.5%7C0.75%7C1.25%7C1.5&so=405874&srcid=5364.C12&zat=4&avt=4&admt=3&csz=native&vcpi=3&dvb=Samsung&dvm=SM-G950F&dvmn=Galaxy+S8&dvbr=Chrome+Mobile&dvbv=&co=IN&ci=others&hk=av&apnid=&opid=1203&bs=320x50&os=Android&osv=9.0&osid=3&vpi=3&ute=1","https://ad.doubleclick.net/ddm/trackimp/N1020132.3Jio1"],"clickTrackers":["https://ajdivotclibloab24.jio.com/delivery/ck.php?p=2__b=484224__zoneid=5364__cb=05f6e772__dc=1800__cd=jio_cluster-1589883910__c=79830__zae=2__cai=50175__px=1__ml=native__tm=0__mn=Jio+Ads+Demo+3.14.8__vr=A-AN-3.15.8__sw=1080__sh=2076__cnt=12__mser=cdn__vuid=I3c8759e0-050c-49d3-ba77-5b70dfea12c7__dat=5__dacp=2__advid=3c8759e0-050c-49d3-ba77-5b70dfea12c7__zt=a__sa=4__dd=0__pid=79830__app=1__ca=4__sp=__ai=com.jio.test__fca=1__fcva=2__cpmt=0__cpct=0__cpat=0__cpcvt=0__pb=0.25%7C0.5%7C0.75%7C1.25%7C1.5__so=405874__srcid=5364.C12__zat=4__avt=4__admt=3__csz=native__vcpi=3__dvb=Samsung__dvm=SM-G950F__dvmn=Galaxy+S8__dvbr=Chrome+Mobile__dvbv=__co=IN__ci=others__hk=av__apnid=__opid=1203__bs=320x50__c=79830__os=Android__osv=9.0__osid=3__vpi=3__ute=1__r=https%3A%2F%2Fwww.jio.com%3Ftrnid%3D5364.C12_484224_05f6e772&trackonly=1","https://ad.doubleclick.net/ddm/trackimp/N1020132.HTMLAd1"],"customImage":"https://jioads.akamaized.net/i/1200x450_e/eba585e38839d752ce29750623dc63b9.jpeg?5364.C12_484224_05f6e772_A-AN-3.15.8","creativeViewTrackers":["https://jioads.akamaized.net/tracking/e.gif?trnid=5364_484224_05f6e772&event=__creativeview_[dimension]"],"creativeClickTrackers":["https://jioads.akamaized.net/tracking/e.gif?trnid=5364_484224_05f6e772&event=__creativeclick_[dimension]"]}';

//$type     = 'multi_ad';
//$response = '{"status":"000","request-id":"5364_0_e318d9b2_[ccb]","type":"2","size":"banner","config":{"allow-extraction":"1"},"campaigns":["79830"]}';

$obj    = new AdRequest($adType, $type, $response);
$output = $obj->check($response);
//print_r($output);

include "form.php";

//RAVI PATEL : 2020-05-20 : CALLING MULTI NATIVE AD
$adType2   = 2;
$type2     = 'multi_ad';
//RAVI PATEL : 2020-05-20 : REPLACE LOGIC FOR S2S CALL
$multiAdNativeInfeedJsonFile = "./AdResponses/MultiAd_NativeInfeed.json";
$multiAdNativeInfeedJson = file_get_contents($multiAdNativeInfeedJsonFile);

$adRequestObj = new AdRequest($adType2, $type2, $multiAdNativeInfeedJson);
print_r($adRequestObj->check($multiAdNativeInfeedJson));

exit;
?>