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
import { useCameraDevices, useFrameProcessor } from 'react-native-vision-camera';
import { Camera } from 'react-native-vision-camera';
import { runOnJS } from 'react-native-reanimated';
import Api from '../services/Api';
const Scanner = ({navigation}) => {
  const theme = useContext(ThemeContext);
  const user = useContext(UserContext);
  // Camera
  const [hasPermission, setHasPermission] = React.useState(false);
  const [ticket,setTicket] = useState()
  const devices = useCameraDevices();
  const device = devices.back;
  const [loading,setLoading] = useState(false)
  const [errorMsg, seterrorMsg] = useState() 
  const checkTicket = async (ticket) => {
    setLoading(true)
    try {
      let fTicket = ticket.split('-')
      if(fTicket.length > 1){
        if(fTicket[0] == 'TXB') {
          seterrorMsg(null)
          let payload = {
            ticket: ticket
          }
          let req = await Api.checkTicket(payload, user.access_token)
          if(req.status === 200) {
            let { data, status, msg } = req.data
            if(status) {
              navigation.navigate('Detail', {
                id: data.id
              });
              seterrorMsg(null)
            } else {
              seterrorMsg(msg)
            }
          } else {
            seterrorMsg('Unkown qrcode')
          }
        } else {
          seterrorMsg('Unkown qrcode')
        }
      } else {
        seterrorMsg('Unkown qrcode')
      }
      setLoading(false)
    } catch (error) {
      console.log(error)
      setLoading(false)
    }
  }
  const frameProcessor = useFrameProcessor((frame) => {
    'worklet'
    let types = 256
    let options = {
      checkInverted: true
    }
    let code = __scanCodes(frame, [types], options);
    if(code.length > 0) {
      // runOnJS(navigation.push)('Detail',code[0].displayValue);
      runOnJS(checkTicket)(code[0].displayValue);
    } else {
      runOnJS(setTicket)(null);
    }
  }, [])
  
  const details = (param) => {
    console.log(param)
    navigation.push('Detail')
  }
  const TheCamera = () => {
    return (
      device != null &&
      hasPermission && (
        <>
          <Camera
            style={[theme.wp100,theme.bgyellow,theme.h500]}
            device={device}
            isActive={true}
            frameProcessor={frameProcessor}
            frameProcessorFps={1}
          />
          <View style={[theme.px20]}>
            {
            (loading) ? (
              <Text style={[theme['p13-400'],{color:'#fff'},{backgroundColor:'#0ff'},theme.mt20,theme.tCenter,theme.br6]}>Memproses...</Text>
            ) : null
            }
            {
            (errorMsg) ? (
              <Text style={[theme['p13-400'],{color:'#fff'},{backgroundColor:'#f00'},theme.mt20,theme.tCenter,theme.br6]}>{errorMsg}</Text>
            ) : null
            }
          </View>
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
      </ScrollView>
    </SafeAreaView>
    </>
  );
};

export default Scanner;
