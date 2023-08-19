import React, {useEffect, useContext, useState} from 'react';
import {Text, View, Image, TouchableWithoutFeedback } from 'react-native';
import {ThemeContext} from '../context/ThemeContext';
import im from '../config/Images';
const Nav = ({navigation, ...props}) => {
  const theme = useContext(ThemeContext);
  useEffect(() => {
  }, []);
  return (
    <>
    <View style={[theme.absolute, theme.bottom0, theme.wp100, theme.h80, theme.fRow, theme.fjCenter, theme.faStart, theme.bgwhite, theme.brtl8,theme.brtr8]}>
      <TouchableWithoutFeedback onPress={()=>{
        
      }}>
        <View style={[theme.mx80, theme.fjCenter, theme.faCenter, theme.mmt35, theme.w100]}>
          <View style={[theme.mb10,theme.relative]}>
            <Image source={im.btn_scan} style={[theme.w75,theme.h75]}/>
          </View>
          <Text style={[theme['h15-700'], theme.cgrey]}>Scan Ticket</Text>
        </View>
      </TouchableWithoutFeedback>
    </View>
    </>
  );
};

export default Nav;
