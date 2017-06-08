import React, { Component } from 'react';
import VideoPlayer from './Video.jsx';

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
        const BASE_URL = `https://glosbe.com/gapi/translate?from=eng&dest=ru&format=json&phrase=`;
        let FETCH_URL = `http://localhost:8000/api/${transWords}/eng/rus`;
        console.log(FETCH_URL);


        fetch(FETCH_URL, {
            method: 'GET',
        })
        .then(response => response.json())
        .then(json => {
            const query = json[0].text;
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
            console.log(json.text.test);
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
                    <button onClick={() => this.sendData(this.props.nodes, this.props.userCredentials)}>Save word</button>
                </div>
            </div>
        )
    }
}

export default Modal;