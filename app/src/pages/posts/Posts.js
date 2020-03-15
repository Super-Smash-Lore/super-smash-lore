import React, { useEffect } from 'react'
import Card from "react-bootstrap/Card";
import CardColumns from "react-bootstrap/CardColumns";
import Row from "react-bootstrap/Row";
import FormControl from "react-bootstrap/FormControl";
import Button from "react-bootstrap/Button";
import Container from 'react-bootstrap/Container'
import { useDispatch, useSelector } from 'react-redux'
import { getAllPosts } from '../../shared/actions/post-actions'
import { PostCard } from './PostCard';

export const Posts = () => {
	const dispatch = useDispatch();
	const posts = useSelector(state => {
		console.log(state)
		return state.posts ? state.posts : []});
	console.log(posts)

	const sideEffects = () => {
		dispatch(getAllPosts())
	}
	const sideEffectInputs = [];

	useEffect(sideEffects, sideEffectInputs)
