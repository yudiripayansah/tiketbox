import React, {useEffect, useContext, useState} from 'react';
import {View, Image, TouchableOpacity, TextInput, Text} from 'react-native';
import {ThemeContext} from '../context/ThemeContext';
import {AuthContext} from '../context/AuthContext';
import {UserContext} from '../context/UserContext';
import { useRoute } from '@react-navigation/native';
import im from '../config/Images';
import Modal from '../components/Modal'
const Header = ({navigation, ...props}) => {
  const route = useRoute();
  const {currentScreen} = props;
  const theme = useContext(ThemeContext);
  const user = useContext(UserContext);
  const {removeUser} = useContext(AuthContext);
  const [header, setHeader] = useState(Object)
  const [modalLogout, setModalLogout] = useState(false)
  const doLogout = () => {
    removeUser();
  };
  const CLogo = () => {
    return (
      <Image
        source={im.logo}
        style={[theme.w57,theme.h44,{objectFit:'contain'}]}
      />
    )
  }
  const CTitle = () => {
    return (
      <Text style={[theme['h20-600'],theme.cwhite]}>{currentScreen}</Text>
    )
  }
  const CBack = () => {
    return (
      <TouchableOpacity onPress={() => {navigation.goBack()}}>
        <Image
          source={im.icon_back}
          style={[theme.w18,theme.h18]}
        />
      </TouchableOpacity>
    )
  }
  const CLogout = () => {
    return (
      <TouchableOpacity onPress={() => {setModalLogout(true)}}>
        <Image
          source={im.icon_logout}
          style={[theme.w18,theme.h18]}
        />
      </TouchableOpacity>
    )
  }
  const HeaderHome = () => {
    return (
      <>
      <View style={[theme.wp20]}>
        <CLogo/>
      </View>
      <View style={[theme.wp60, theme.faCenter]}>
        <CTitle/>
      </View>
      <View style={[theme.wp20, theme.faEnd]}>
        <CLogout/>
      </View>
      </>
    )
  }
  const HeaderTitle = () => {
    return (
      <>
      <View style={[theme.wp20]}>
        <CBack/>
      </View>
      <View style={[theme.wp60, theme.faCenter]}>
        <CTitle/>
      </View>
      <View style={[theme.wp20, theme.faEnd]}>
        <CLogout/>
      </View>
      </>
    )
  }
  const getHeader = () => {
    if(currentScreen == 'Scan Ticket'){ 
      return (
        <HeaderHome/>
      )
    } else {
      return (
        <HeaderTitle/>
      )
    }
  }
  const modal = {
    header: 'Perhatian!!!',
    content: 'Apakah anda yakin ingin logout dari aplikasi?',
    footer: () => {
      return (
        <View style={[theme.fRow,theme.fjEnd,theme.faCenter,theme.mt25]}>
          <TouchableOpacity style={[theme.px5]} onPress={() => {setModalLogout(false)}}>
            <Text style={[theme['p12-700'],{color:'#252525'}]}>Batal</Text>
          </TouchableOpacity>
          <TouchableOpacity style={[theme.px5]} onPress={() => {doLogout()}}>
            <Text style={[theme['p12-700'],{color:'#252525'}]}>Logout</Text>
          </TouchableOpacity>
        </View>
      )
    }
  }
  useEffect(() => {
    let mounted = true;
    navigation.addListener('focus', () => {
      if (mounted) {
        setHeader()
      }
    });
    return () => (mounted = false);
  }, []);

  return (
    <>
    <View
      style={[
        theme.wp100,
        theme.fRow,
        theme.fjBetween,
        theme.faCenter,
        theme.p10,
        theme.absolute,
        theme.top0,
        {backgroundColor:'#252525'},
        {zIndex: 2},
      ]}>
      {getHeader()}
    </View>
    {
      (modalLogout) ? (
        <Modal
          header={modal.header}
          content={modal.content}
          footer={modal.footer()}
        />
      ) : null
    }
    </>
  );
};

export default Header;
