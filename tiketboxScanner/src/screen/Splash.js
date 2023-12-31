import React, { useEffect, useContext } from 'react'
import { View, Image, SafeAreaView } from 'react-native';
import { ThemeContext } from '../context/ThemeContext';
import im from '../config/Images';
const Splash = ({ navigation }) => {
  const theme = useContext(ThemeContext)
  useEffect(() => {
    
  }, [])

  return (
    <SafeAreaView style={[theme.bgblack, theme.w%100, theme.h%100,theme.faCenter, theme.fjCenter, {flex: 1}]}>
          <Image
            style={[theme.w135, theme.h78, {objectFit: 'contain'}]}
            source={im.logo}
          />
    </SafeAreaView>
  )
}

export default Splash