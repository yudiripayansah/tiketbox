
import { createStackNavigator, TransitionPresets } from '@react-navigation/stack';
import {useState} from 'react';
import Forgot from '../screen/Forgot';
import Home from '../screen/Home';
import Login from '../screen/Login';
import Nav from '../components/Navigation';
import Header from '../components/Header';
const AuthStack = createStackNavigator();
const MainStack = createStackNavigator();
const options = {
    ...TransitionPresets.SlideFromRightIOS
}
export const RouteMain = ({navigation}) => {
    let [activeHeader, setActiveHeader] = useState('Home')
    return (
        <>
            <Header navigation={navigation} currentScreen={activeHeader}/>
            <MainStack.Navigator
                screenOptions={{
                    headerShown: false,
                }}
                screenListeners={({ navigation }) => ({
                    state: (e) => {
                        let index = e.data.state.index
                        let routes = e.data.state.routes
                        let routeName = routes[index].name
                        if(
                            routeName == 'Radio'
                            || routeName == 'RadioDetails'
                            ){
                            routeName = 'Ardan Radio'
                        }
                        if(
                            routeName == 'Penyiar'
                            ){
                            routeName = 'Ardan Announcher'
                        }
                        if(
                            routeName == 'ProgramDetails'
                            ){
                            routeName = 'Program'
                        }
                        if(
                            routeName == 'ArdanContent'
                            ){
                            routeName = 'Ardan Content'
                        }
                        if(
                            routeName == 'Social'
                            ){
                            routeName = 'Ardan Social'
                        }
                        if(
                            routeName == 'SocialSharingDetails'
                            ){
                            routeName = 'Forum'
                        }
                        if(
                            routeName == 'Home'
                            ){
                            routeName = 'Scan Ticket'
                        }
                        setActiveHeader(routeName)
                    },
                })}
                >
                <MainStack.Screen name={'Home'} component={Home} options={options}/>
            </MainStack.Navigator>
            <Nav navigation={navigation} currentScreen={activeHeader}/>
        </>
    );
}
export const RouteAuth = ({navigation}) => {
    return (
        <>
            <AuthStack.Navigator
                screenOptions={{
                    headerShown: false,
                }}>
                <AuthStack.Screen name={'Login'} component={Login} options={options}/>
                <AuthStack.Screen name={'Forgot'} component={Forgot} options={options}/>
            </AuthStack.Navigator>
        </>
    );
}