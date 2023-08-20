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
import {UserContext} from '../context/UserContext';
import im from '../config/Images';
const Scanner = ({navigation}) => {
  const theme = useContext(ThemeContext);
  const user = useContext(UserContext);
  const [cameraPermission, setCameraPermission] = useState();

  useEffect(() => {
    
  }, []);

  return (
    <SafeAreaView style={[{backgroundColor:'#f7f7f7'},{flexGrow: 1},theme.pt60]}>
      <ScrollView style={[]}>
        <View>
        </View>
      </ScrollView>
    </SafeAreaView>
  );
};

export default Scanner;
