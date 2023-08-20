import React, {useEffect, useContext, useState} from 'react';
import {View, Image, TouchableOpacity, TextInput, Text} from 'react-native';
import {ThemeContext} from '../context/ThemeContext';
import {AuthContext} from '../context/AuthContext';
import {UserContext} from '../context/UserContext';
import { useRoute } from '@react-navigation/native';
import im from '../config/Images';
const Modal = ({navigation, ...props}) => {
  const route = useRoute();
  const {header,content,footer} = props;
  const theme = useContext(ThemeContext);
  const user = useContext(UserContext);
  const {removeUser} = useContext(AuthContext);
  useEffect(() => {
  }, []);

  return (
    <View
      style={[
        theme.absolute,
        theme.top0,
        theme.bottom0,
        theme.wp100,
        theme.faCenter,
        theme.fjCenter,
        {backgroundColor:'background: rgba(3, 3, 3, 0.54);'},
        {zIndex: 2},
      ]}>
        <View style={[theme.p15,theme.wp90,theme.bgwhite,theme.br15]}>
          <Text style={[theme['p16-700'],{color:'#363636'}]}>{header}</Text>
          <Text style={[theme['p12-400'],{color:'#363636'},theme.mt5]}>{content}</Text>
          {footer}
        </View>
    </View>
  );
};

export default Modal;
