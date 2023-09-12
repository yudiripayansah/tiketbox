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
import Api from '../services/Api';
import helper from '../config/Helper';
import QRCode from 'react-native-qrcode-svg';
const Details = ({route,navigation}) => {
  const theme = useContext(ThemeContext);
  const user = useContext(UserContext);
  const [ticket,setTicket] = useState()
  const [loading, setLoading] = useState(false)
  const { id } = route.params;
  const detailTicket = async () => {
    try {
      let payload = {
        id: id
      }
      let req = await Api.detailTicket(payload, user.access_token)
      if(req.status == 200) {
        let {data,status,msg} = req.data
        if(status) {
          setTicket(data)
        }
      }
    } catch (error) {
      console.log(error)
    }
  }
  const gunakanTicket = async () => {
    setLoading(true)
    try {
      let payload = {
        id: id,
        id_user: user.id
      }
      let req = await Api.useTicket(payload, user.access_token)
      if(req.status == 200) {
        let {data,status,msg} = req.data
        if(status) {
          navigation.navigate('Home')
        }
      }
      setLoading(false)
    } catch (error) {
      console.log(error)
      setLoading(false)
    }
  }
  useEffect(() => {
    detailTicket()
  }, []);

  return (
    <>
    <SafeAreaView style={[{backgroundColor:'#f7f7f7'},{flexGrow: 1},theme.pt50]}>
      <ScrollView style={[]}>
        {(ticket) ? (
          <>
          <View style={[]}>
            <View style={[theme.fRow,{backgroundColor:'#252525'},theme.px15,theme.pt20,theme.pb100]}>
                {
                  (ticket.status == 'unused' || ticket.status == 'active') ? (
                  <View style={[{backgroundColor:'rgba(77, 139, 49, 0.75)'},theme.p10,theme.br10,theme.fRow,theme.faCenter,theme.fjCenter,theme.wp100,theme.mb15]}>
                    <Image source={im.icon_check} style={[theme.w12,theme.h12,{objectFit:'contain'}]}/>
                    <Text style={[theme['p12-700'],theme.cwhite,theme.ms5]}>Ticket ini belum digunakan</Text>
                  </View>
                  ) : null
                }
              <ImageBackground source={{uri: ticket.event.images[0].image_url}} resizeMode='cover' style={[theme.relative,theme.wp100,theme.h187,theme.brtl10,theme.brtr10,{overflow:'hidden'}]}>
                <View style={[theme.absolute,theme.wp100,theme.bottom0,theme.p10]}>
                  <Text style={[theme['p10-700'],theme.cwhite]}>Ticket ID: {ticket.ticket_id}</Text>
                  <Text style={[theme['p24-700'],theme.cwhite]}>{ticket.event.name}</Text>
                </View>
              </ImageBackground>
            </View>
          </View>
          <View style={[theme.px15,theme.mmt100]}>
            <View style={[theme.bgwhite,theme.p10,theme.bbw1,theme.blw1,theme.brw1,theme.bsolid,theme.brbl20,theme.brbr20,{borderColor:'#dedede'}]}>
              <Text style={[theme['p10-700'],{color:'#747474'}]}>Tunjukan QR code di pintu login</Text>
              <Text style={[theme['p18-700'],{color:'#292929'}]}>{ticket.ticket.name}</Text>
              <View style={[theme.fRow,theme.faCenter,theme.mt10]}>
                <View style={[theme.w20,theme.h20,theme.br100,theme.faCenter,theme.fjCenter,{backgroundColor:'#252525'}]}>
                  <Image source={im.icon_place} style={[theme.w12,theme.h12,{objectFit:'contain'}]}/>
                </View>
                <Text style={[theme['p10-700'],{color:'#292929'},theme.ms5]}>{ticket.event.location_name}, {ticket.event.location_address}, {ticket.event.location_city}</Text>
              </View>
              <View style={[theme.fRow,theme.faCenter,theme.mt10]}>
                <View style={[theme.w20,theme.h20,theme.br100,theme.faCenter,theme.fjCenter,{backgroundColor:'#252525'}]}>
                  <Image source={im.icon_time} style={[theme.w12,theme.h12,{objectFit:'contain'}]}/>
                </View>
                <Text style={[theme['p10-700'],{color:'#292929'},theme.ms5]}>{helper.dateIndo(ticket.date)} • {helper.timeIndo(ticket.date+' '+ticket.event.time_start)} - {helper.timeIndo(ticket.date+' '+ticket.event.time_end)}</Text>
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
                <QRCode
                  value={ticket.ticket_id}
                />
              </View>
            </View>
            {
              (ticket.status == 'unused' || ticket.status == 'active') ? (
                <TouchableOpacity style={[theme.h45,theme.w200,theme.br15,theme.faCenter,theme.fjCenter,theme.msAuto,theme.meAuto,{backgroundColor:'#252525'},theme.mb150,theme.mt20]} 
                onPress={()=>{
                  gunakanTicket()
                }}>
                  <Text style={[theme['p14-700'],theme.cwhite]}>{(loading) ? 'Processing...' : 'Gunakan Tiket'}</Text>
                </TouchableOpacity>
              ) : null
            }
          </View>
          </>
        ) : null}
      </ScrollView>
    </SafeAreaView>
    </>
  );
};

export default Details;
