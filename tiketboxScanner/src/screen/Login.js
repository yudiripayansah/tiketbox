import React, { useState, useEffect, useContext } from 'react';
import { Text, View, TextInput, TouchableOpacity, Image, KeyboardAvoidingView } from 'react-native';
import {ThemeContext} from '../context/ThemeContext';
import {AuthContext} from '../context/AuthContext';
import Api from '../services/Api'
import im from '../config/Images';
const Login = ({navigation}) => {
  const theme = useContext(ThemeContext)
  const {setUser} = useContext(AuthContext);
  const [email, setEmail] = useState()
  const [password, setPassword] = useState()
  const [errorMsg, seterrorMsg] = useState()
  const [loading, setLoading] = useState(false)
  const [viewPassword, setViewPassword] = useState(false)
  useEffect(() => {
    
  },[])
  const doLogin = async () => {
    setLoading(true)
    try {
      if(email && password) {
        let payload = {
          email: email,
          password: password
        }
        let req = await Api.login(payload)
        if(req.status == 200) {
          const {data,status,msg} = req.data
          if(status) {
            setUser(data)
          } else {
            seterrorMsg(msg)
          }
        }
      } else {
        seterrorMsg('Email dan Password harus diisi')
      }
      setLoading(false)
    } catch (error) {
      setLoading(false)
      seterrorMsg(error)
    }
  }
  return (
    <KeyboardAvoidingView style={[theme.w%100,theme.h%100, {backgroundColor:'#F5F5F5'}, theme.fjStart ,{flexGrow: 1}]}>
      <View style={[theme.faCenter,theme.fRow,theme.fjCenter,theme.py35, {backgroundColor:'#252525'}]}>
        <Image
          style={[theme.w57, theme.h44, {objectFit: 'contain'}]}
          source={im.logo}
        />
        <Image
          style={[theme.w86, theme.h44, {objectFit: 'contain'}]}
          source={im.logo_text}
        />
      </View>
      <View style={[theme.w%100, theme.py25,theme.px25]}>
        <Text style={[theme.cblack,theme['p24-600'], theme.tCenter]}>TicketBox Management</Text>
        <Text style={[theme.cgrey,theme['p13-400'], theme.tCenter, theme.mt10]}>Silahkan login menggunakan user & password yang anda miliki.</Text>
        {
          (errorMsg) ? (
            <Text style={[theme['p13-400'],{color:'#f00'},theme.mt10,theme.tCenter]}>{errorMsg}</Text>
          ) : null
        }
        <View style={[ theme.bgwhite, theme.px20, theme.ps50, theme.w%100, theme.mt20, theme.br12]}>
          <Image style={[theme.w20,theme.h20, theme.absolute,theme.left20, theme.top15,{objectFit: 'contain'}]} source={im.icon_mail}/>
          <TextInput style={[theme.p0,theme['p13-500'],theme.cblack]} placeholder='Email' onChangeText={setEmail} value={email} placeholderTextColor={'#000'}/>
        </View>
        <View style={[ theme.bgwhite, theme.px50, theme.w%100, theme.mt15, theme.br12]}>
          <Image style={[theme.w20,theme.h20, theme.absolute,theme.left20, theme.top15,{objectFit: 'contain'}]} source={im.icon_lock}/>
          <TextInput style={[theme.p0,theme['p13-500'],theme.cblack]} placeholder='Password' secureTextEntry={!viewPassword} onChangeText={setPassword} value={password} placeholderTextColor={'#000'}/>
          <TouchableOpacity onPress={() => {setViewPassword(!viewPassword)}} style={[theme.absolute,theme.right20, theme.top15]}>
          <Image style={[theme.w20,theme.h20,{objectFit: 'contain'}]} source={im.icon_eye}/>
          </TouchableOpacity>
        </View>
        <View style={[theme.fRow, theme.mt25, theme.fjEnd]}>
          <TouchableOpacity>
          <Text style={[theme.cgrey, theme['p13-400']]}>Forgot Password?</Text>
          </TouchableOpacity>
        </View>
        <TouchableOpacity style={[{backgroundColor:'#252525'}, theme.faCenter, theme.py15, theme.br52, theme.mt25]} onPress={() => {doLogin()}}>
          <Text style={[theme['p17-700'], theme.cwhite]}>{(loading) ? 'Please Wait...' : 'Login'}</Text>
        </TouchableOpacity>
      </View>
    </KeyboardAvoidingView>
  )
}

export default Login