import React, {useEffect, useContext, useState} from 'react';
import {
  View,
  Text,
  TextInput,
  SafeAreaView,
  ScrollView,
  TouchableOpacity,
  Image,
  ImageBackground,
  StyleSheet
} from 'react-native';
import {ThemeContext} from '../context/ThemeContext';
import {UserContext} from '../context/UserContext';
import im from '../config/Images';
// Camera
import { useCameraDevices } from 'react-native-vision-camera';
import { Camera } from 'react-native-vision-camera';
import { useScanBarcodes, BarcodeFormat } from 'vision-camera-code-scanner';
const Scanner = ({navigation}) => {
  const theme = useContext(ThemeContext);
  const user = useContext(UserContext);
  // Camera
  const [hasPermission, setHasPermission] = React.useState(false);
  const devices = useCameraDevices();
  const device = devices.back;

  const [frameProcessor, barcodes] = useScanBarcodes([BarcodeFormat.QR_CODE], {
    checkInverted: true,
  });

  const TheCamera = () => {
    return (
      device != null &&
      hasPermission && (
        <>
          <Camera
            style={StyleSheet.absoluteFill}
            device={device}
            isActive={true}
            frameProcessor={frameProcessor}
            frameProcessorFps={60}
          />
          {barcodes.map((barcode, idx) => (
            <Text key={idx}>
              {barcode.displayValue}
            </Text>
          ))}
        </>
      )
    )
  }
  useEffect(() => {
    (async () => {
      const status = await Camera.requestCameraPermission();
      setHasPermission(status === 'authorized');
    })();
  }, []);

  return (
    <>
    <SafeAreaView style={[{backgroundColor:'#f7f7f7'},{flexGrow: 1},theme.pt50]}>
      <ScrollView style={[]}>
        <TheCamera/>
        <View style={[]}>
          <View style={[theme.fRow,{backgroundColor:'#252525'},theme.px15,theme.pt40,theme.pb100]}>
            <View style={[{backgroundColor:'rgba(77, 139, 49, 0.75)'},theme.p10,theme.br10,theme.fRow,theme.faCenter,theme.fjCenter,theme.wp100]}>
              <Image source={im.icon_check} style={[theme.w12,theme.h12,{objectFit:'contain'}]}/>
              <Text style={[theme['p12-700'],theme.cwhite,theme.ms5]}>Ticket ini belum digunakan</Text>
            </View>
            <ImageBackground source={im.banner_ticket} resizeMode='cover' style={[theme.relative,theme.wp100,theme.h187,theme.brtl10,theme.brtr10,{overflow:'hidden'},theme.mt15]}>
              <View style={[theme.absolute,theme.wp100,theme.bottom0,theme.p10]}>
                <Text style={[theme['p10-700'],theme.cwhite]}>Ticket ID: 123900071</Text>
                <Text style={[theme['p24-700'],theme.cwhite]}>Prambanan Jazz</Text>
              </View>
            </ImageBackground>
          </View>
        </View>
        <View style={[theme.px15,theme.mmt100]}>
          <View style={[theme.bgwhite,theme.p10,theme.bbw1,theme.blw1,theme.brw1,theme.bsolid,theme.brbl20,theme.brbr20,{borderColor:'#dedede'}]}>
            <Text style={[theme['p10-700'],{color:'#747474'}]}>Tunjukan QR code di pintu login</Text>
            <Text style={[theme['p18-700'],{color:'#292929'}]}>EAST VIP</Text>
            <View style={[theme.fRow,theme.faCenter,theme.mt10]}>
              <View style={[theme.w20,theme.h20,theme.br100,theme.faCenter,theme.fjCenter,{backgroundColor:'#252525'}]}>
                <Image source={im.icon_place} style={[theme.w12,theme.h12,{objectFit:'contain'}]}/>
              </View>
              <Text style={[theme['p10-700'],{color:'#292929'},theme.ms5]}>JCC Convention Center</Text>
            </View>
            <View style={[theme.fRow,theme.faCenter,theme.mt10]}>
              <View style={[theme.w20,theme.h20,theme.br100,theme.faCenter,theme.fjCenter,{backgroundColor:'#252525'}]}>
                <Image source={im.icon_time} style={[theme.w12,theme.h12,{objectFit:'contain'}]}/>
              </View>
              <Text style={[theme['p10-700'],{color:'#292929'},theme.ms5]}>Minggu, 23 Januari 2022 • 09:00 - 21:00</Text>
            </View>
            <View style={[theme.mt20,theme.p10,theme.br10,theme.bw1,theme.bsolid,theme.fRow,theme.fjBetween,theme.faCenter,{borderColor:'#dfdfdf'}]}>
              <View style={[theme.fRow,theme.faCenter]}>
                <View style={[theme.h50,theme.w50,theme.faCenter,theme.fjCenter,theme.br10,{backgroundColor:'#252525'}]}>
                  <Image source={im.icon_speaker} style={[theme.h24,theme.w24]}/>
                </View>
                <View style={[theme.ms10]}>
                  <Text style={[theme['p12-700'],{color:'#292929'}]}>Benefit Ticket</Text>
                  <Text style={[theme['p10-700'],{color:'#747474'}]}>Tap untuk Melihat</Text>
                </View>
              </View>
              <Image source={im.icon_question} style={[theme.h20,theme.w20]}/>
            </View>
            <View style={[theme.mt40,theme.pt40,theme.pb40,theme.btw2,theme.bdashed,theme.bblack,theme.fjCenter,theme.faCenter]}>
              <Image source={im.qr} style={[theme.w170,theme.h170,{objectFit:'contain'}]}/>
            </View>
          </View>
          <TouchableOpacity style={[theme.h45,theme.w200,theme.br15,theme.faCenter,theme.fjCenter,theme.msAuto,theme.meAuto,{backgroundColor:'#252525'},theme.mb150,theme.mt20]}>
            <Text style={[theme['p14-700'],theme.cwhite]}>Gunakan Tiket</Text>
          </TouchableOpacity>
        </View>
      </ScrollView>
    </SafeAreaView>
    </>
  );
};

export default Scanner;
