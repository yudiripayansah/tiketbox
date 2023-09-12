import React, {useEffect, useContext, useState} from 'react';
import {
  View,
  Text,
  TextInput,
  SafeAreaView,
  ScrollView,
  TouchableOpacity,
  Image
} from 'react-native';
import {ThemeContext} from '../context/ThemeContext';
import {AuthContext} from '../context/AuthContext';
import {UserContext} from '../context/UserContext';
import im from '../config/Images';
import Api from '../services/Api';
const Home = ({navigation}) => {
  const theme = useContext(ThemeContext);
  const user = useContext(UserContext);
  const {removeUser} = useContext(AuthContext);
  const [ticket, setTicket] = useState()
  const [errorMsg, seterrorMsg] = useState()
  const [loading,setLoading] = useState(false)
  const checkTicket = async () => {
    setLoading(true)
    try {
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
      }
      setLoading(false)
    } catch (error) {
      console.log(error)
      setLoading(false)
    }
  }
  useEffect(() => {
    let mounted = true;
    navigation.addListener('focus', () => {
      if (mounted) {
        
      }
    });
    return () => (mounted = false);
  }, []);
  return (
    <SafeAreaView style={[{backgroundColor:'#f7f7f7'},{flexGrow: 1},theme.pt60]}>
      <ScrollView style={[]}>
        <View style={[]}>
          <View style={[theme.fRow,{backgroundColor:'#252525'},theme.px15,theme.pt40,theme.pb100]}>
            <Image source={im.user} style={[theme.me10]} />
            <View style={[theme.fjCenter]}>
              <View style={[theme.fRow]}>
                <Text style={[theme['p12-700'],theme.cwhite]}>Petugas</Text>
                <Text style={[theme['p12-400'],theme.cwhite]}>: {user.name}</Text>
              </View>
              <View style={[theme.fRow]}>
                <Text style={[theme['p12-700'],theme.cwhite]}>Event</Text>
                <Text style={[theme['p12-400'],theme.cwhite]}>: Prambanan Jazz</Text>
              </View>
              <View style={[theme.fRow]}>
                <Text style={[theme['p12-700'],theme.cwhite]}>Tanggal</Text>
                <Text style={[theme['p12-400'],theme.cwhite]}>: 23 Januari 2022 - 24 Januari 2022</Text>
              </View>
            </View>
          </View>
        </View>
        <View style={[theme.fRow,theme.fjBetween,theme.faCenter,theme.px15,theme.mmt80]}>
          <TouchableOpacity style={[theme.w170,theme.h170,theme.br8,theme.faCenter,theme.fjCenter,theme.p25,theme.bgwhite,theme.bw1,{borderColor:'#C9C9C9'}]}>
            <Image source={im.btn_ticket}/>
            <Text style={[theme['p16-700'],theme.cblack]}>Total Ticket</Text>
            <Text style={[theme['p10-700'],theme.cgrey]}>1230 Ticket</Text>
          </TouchableOpacity>
          <TouchableOpacity style={[theme.w170,theme.h170,theme.br8,theme.faCenter,theme.fjCenter,theme.p25,theme.bgwhite,theme.bw1,{borderColor:'#C9C9C9'}]}>
            <Image source={im.btn_success}/>
            <Text style={[theme['p16-700'],theme.cblack]}>Scan Success</Text>
            <Text style={[theme['p10-700'],theme.cgrey]}>120 Ticket</Text>
          </TouchableOpacity>
        </View>
        <View style={[theme.px15,theme.mt20]}>
          <Text style={[theme['p16-800'],theme.cblack]}>Input Manual</Text>
          <View style={[theme.bw1,theme.bsolid,{borderColor:'#C9C9C9'},theme.br10,theme.mt5]}>
            <TextInput style={[theme.wp100,theme['p12-400'],theme.cblack,theme.h40]} placeholder='Example: TXB0000001' placeholderTextColor={'#000'} value={ticket} onChangeText={setTicket}/>
          </View>
          <TouchableOpacity style={[theme.w100,theme.h30,theme.faCenter,theme.fjCenter,{backgroundColor:'#252525'},theme.br8,theme.msAuto,theme.mt10]}
            onPress={() => {
              checkTicket()
            }}  
          >
            <Text style={[theme['p12-400'],theme.cwhite]}>{(loading) ? 'Processing...' :'Process'}</Text>
          </TouchableOpacity>
          {
          (errorMsg) ? (
            <Text style={[theme['p13-400'],{color:'#fff'},{backgroundColor:'#f00'},theme.mt20,theme.tCenter,theme.br6]}>{errorMsg}</Text>
          ) : null
          }
        </View>
      </ScrollView>
    </SafeAreaView>
  );
};

export default Home;
