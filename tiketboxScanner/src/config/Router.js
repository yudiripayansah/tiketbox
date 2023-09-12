
import { createStackNavigator, TransitionPresets } from '@react-navigation/stack';
import {useState} from 'react';
import Forgot from '../screen/Forgot';
import Home from '../screen/Home';
import Detail from '../screen/Detail';
import Login from '../screen/Login';
import Scanner from '../screen/Scanner';
import Ticket from '../screen/Ticket';
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
                            routeName == 'Ticket'
                            ){
                            routeName = 'Detail Ticket'
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
                <MainStack.Screen name={'Detail'} component={Detail} options={options}/>
                <MainStack.Screen name={'Scanner'} component={Scanner} options={options}/>
                <MainStack.Screen name={'Ticket'} component={Ticket} options={options}/>
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