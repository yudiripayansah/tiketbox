import React, {useEffect, useContext, useState} from 'react';
import {View, Image, TouchableOpacity, TextInput, Text} from 'react-native';
import {ThemeContext} from '../context/ThemeContext';
import {AuthContext} from '../context/AuthContext';
import {UserContext} from '../context/UserContext';
import { useRoute } from '@react-navigation/native';
import im from '../config/Images';
const Header = ({navigation, ...props}) => {
  const route = useRoute();
  const {currentScreen} = props;
  const theme = useContext(ThemeContext);
  const user = useContext(UserContext);
  const {removeUser} = useContext(AuthContext);
  const [header, setHeader] = useState(Object)
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
  const CSearch = () => {
    return (
      <TextInput
        placeholder="Search..."
        style={[
          {backgroundColor: '#12120B'},
          theme.cwhite,
          theme.br14,
          theme['h10-500'],
          theme.h40,
          theme.w165,
          theme.px10,
          theme.fjCenter,
          {textAlignVertical: 'center'},
        ]}
        placeholderTextColor="#4F4F3F"
        multiline
        numberOfLines={1}
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
          style={[theme.w20,theme.h16]}
        />
      </TouchableOpacity>
    )
  }
  const CFavorite = () => {

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
  );
};

export default Header;
