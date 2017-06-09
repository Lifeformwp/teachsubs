import React, { Component } from 'react';
import VideoPlayer from './Video.jsx';
import Speech from 'react-speech';

class Modal extends Component {

    constructor(props) {
        super(props);
        this.state = {
            words: 'stop',
            previousWord:'stop',
            visible: false
        };
    }

    componentDidMount() {
        this.setState({
            words: '',
            visible: true,
            previousWord: this.props.nodes
        }, function () {
            this.translate();
        });
    }

    componentWillReceiveProps() {
        this.setState({
            words: '',
            visible:true,
            previousWord: this.props.nodes
        }, function () {
            this.translate();
        });
    }

    capitalize(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }

     translate() {
        let transWords = this.props.nodes.toLowerCase();
        //const BASE_URL = `https://glosbe.com/gapi/translate?from=eng&dest=ru&format=json&phrase=`;
        //let FETCH_URL = `http://localhost:8000/api/${transWords}/eng/rus`;
        let FETCH_URL = `http://www.transltr.org/api/translate?text=${transWords}&to=ru`;
        console.log(FETCH_URL);


        fetch(FETCH_URL, {
            method: 'GET',
        })
        .then(response => response.json())
        .then(json => {
            const query = json['translationText'];
            if (query == '') {
                this.setState({words: 'Не удалось перевести текст'});
            } else {
                this.setState({words: this.capitalize(query)});
            }
        });
    }

    close() {
        this.setState({
            visible: false
        }, function() {
            console.log('Good move');
        })
    }

    sendData(word, id) {
        fetch('http://localhost:8000/saveWord', {
            method: 'POST',
            body: JSON.stringify({
                word: word,
                id: id
            })
        })
        .then(response => response.json())
        .then(json => {
            console.log(json.text);
        })
    }
    render() {
        let modalClass = this.state.visible ? "modal-fade-in" : "modal-fade-out";
        let modalStyle = this.state.visible ? {display: "block"} : {display: "none"};
        return (
            <div id="myModal" className="fade-in" style={modalStyle}>
                <div className="content">
                    <span className="close-text" onClick={() => this.close()}>&times;</span>
                    <p className="translated-text">Translation: <span className="translated-word">{this.state.words}</span></p>
                    {
                        this.props.userCredentials === undefined
                        ? <p>Зарегистрируйтесь, чтобы сохранять слова в профиль</p>
                        :   <div>
                                <span>
                                    <button className="button-add" onClick={() => this.sendData(this.props.nodes, this.props.userCredentials)}><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 5 5"><path d="M2 1 h1 v1 h1 v1 h-1 v1 h-1 v-1 h-1 v-1 h1 z"></path></svg></button>
                                </span>
                                <Speech text={this.props.nodes} />
                            </div>
                    }
                </div>
            </div>
        )
    }
}

export default Modal;