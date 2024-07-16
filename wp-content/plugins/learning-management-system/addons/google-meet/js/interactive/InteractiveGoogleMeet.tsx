import {
	Badge,
	Box,
	Button,
	Container,
	Heading,
	HStack,
	Icon,
	Link,
	Stack,
	Text,
	useColorMode,
	useDisclosure,
	useMediaQuery,
	useToast,
} from '@chakra-ui/react';
import { __ } from '@wordpress/i18n';
import humanizeDuration from 'humanize-duration';
import React, { useState } from 'react';
import { BiCalendar } from 'react-icons/bi';
import { RiLiveLine } from 'react-icons/ri';
import { useMutation, useQuery, useQueryClient } from 'react-query';
import { useNavigate, useParams } from 'react-router-dom';
import FullScreenLoader from '../../../../assets/js/back-end/components/layout/FullScreenLoader';
import urls from '../../../../assets/js/back-end/constants/urls';
import { CourseDataMap } from '../../../../assets/js/back-end/types/course';
import API from '../../../../assets/js/back-end/utils/api';
import { getWordpressLocalTime } from '../../../../assets/js/back-end/utils/utils';
import ContentNav from '../../../../assets/js/interactive/components/ContentNav';
import FloatingNavigation from '../../../../assets/js/interactive/components/FloatingNavigation';
import Header from '../../../../assets/js/interactive/components/Header';
import Sidebar from '../../../../assets/js/interactive/components/Sidebar';
import { ThankYouRedirect } from '../../../../assets/js/interactive/components/ThankYouRedirect';
import { COLORS_BASED_ON_SCREEN_COLOR_MODE } from '../../../../assets/js/interactive/constants/general';
import {
	CourseProgressItemsMap,
	CourseProgressMap,
} from '../../../../assets/js/interactive/schemas';
import RedirectNavigation, {
	navigationProps,
} from '../../../../assets/js/interactive/utils/RedirectNavigation';
import GoogleMeetUrls from '../../constants/urls';
import { GoogleMeetStatus } from '../Enums/Enum';
import MeetingTimer from './MeetingTimer';

const InteractiveGoogleMeet = () => {
	const {
		isOpen: isWelcomeUser,
		onOpen: onWelcomeUser,
		onClose: onCloseModal,
	} = useDisclosure();
	const { googleMeetId, courseId }: any = useParams();
	const GoogleMeetAPI = new API(GoogleMeetUrls.googleMeets);
	const courseAPI = new API(urls.courses);
	const progressAPI = new API(urls.courseProgress);
	const progressItemAPI = new API(urls.courseProgressItem);
	const toast = useToast();
	const queryClient = useQueryClient();
	const [meetingStarted, setMeetingStarted] = useState(false);
	const navigate = useNavigate();
	const [largerThan768] = useMediaQuery('(min-width: 768px)');
	const builderAPI = new API(urls.builder);
	const [status, setStatus] = React.useState<string>('');
	const { colorMode } = useColorMode();

	const { isOpen: isSidebarOpen, onToggle: onSidebarToggle } = useDisclosure({
		defaultIsOpen: largerThan768 ? true : false,
	});
	const { isOpen: isHeaderOpen, onToggle: onHeaderToggle } = useDisclosure({
		defaultIsOpen: true,
	});

	const courseProgressQuery = useQuery<CourseProgressMap>(
		[`courseProgress${courseId}`, courseId],
		() => progressAPI.store({ course_id: courseId }),
		{
			onSuccess: (data: any) => {
				data[`has_user_redirected_${courseId}`] === false &&
				data['status'] === 'completed'
					? ThankYouRedirect(data)
					: null;

				data.welcome_message_to_first_time_user.enabled ? onWelcomeUser() : '';
			},
		},
	);

	const builderQuery = useQuery([`builder${courseId}`, courseId], () =>
		builderAPI.get(courseId, 'view'),
	);

	const courseQuery = useQuery<CourseDataMap>(
		[`course${courseId}`, courseId],
		() => courseAPI.get(courseId),
	);

	const googleMeetQuery = useQuery<any>(
		[`google-meet${googleMeetId}`, googleMeetId],
		() => GoogleMeetAPI.get(googleMeetId),
	);

	const completeQuery = useQuery<CourseProgressItemsMap>(
		[`completeQuery${googleMeetId}`, googleMeetId],
		() =>
			progressItemAPI.list({
				item_id: googleMeetId,
				courseId: courseId,
			}),
	);

	const completeMutation = useMutation((data: CourseProgressItemsMap) =>
		progressItemAPI.store(data),
	);

	const onCompletePress = () => {
		completeMutation.mutate(
			{
				course_id: courseId,
				item_id: googleMeetQuery.data.id,
				item_type: 'google-meet',
				completed: true,
			},
			{
				onSuccess: () => {
					queryClient.invalidateQueries(`completeQuery${googleMeetId}`);
					queryClient.invalidateQueries(`courseProgress${courseId}`);

					toast({
						title: __('Mark as Completed', 'learning-management-system'),
						description: __(
							'Google Meet Meeting has been marked as completed.',
							'learning-management-system',
						),
						isClosable: true,
						status: 'success',
					});
					const navigation = googleMeetQuery?.data
						?.navigation as navigationProps;
					RedirectNavigation(navigation, courseId, navigate);
				},
			},
		);
	};

	const start_at: Date = new Date(googleMeetQuery?.data?.starts_at);
	const end_at: Date = new Date(googleMeetQuery?.data?.ends_at);

	React.useEffect(() => {
		googleMeetStatus();
		// eslint-disable-next-line react-hooks/exhaustive-deps
	}, [start_at, end_at]);

	const googleMeetStatus = () => {
		if (start_at >= new Date()) {
			setStatus(GoogleMeetStatus.UpComing);
		} else if (start_at < new Date() && end_at > new Date()) {
			setStatus(GoogleMeetStatus.Active);
		} else if (end_at < new Date()) {
			setStatus(GoogleMeetStatus.Expired);
		} else {
			setStatus(GoogleMeetStatus.All);
		}
	};

	if (
		courseProgressQuery.isSuccess &&
		googleMeetQuery.isSuccess &&
		courseQuery.isSuccess
	) {
		const previousPage = googleMeetQuery?.data?.navigation?.previous;
		const localStartTime = googleMeetQuery?.data?.starts_at;

		return (
			<>
				<Box h="full" overflowX="hidden" pos="relative">
					<Sidebar
						isOpen={isSidebarOpen}
						onToggle={onSidebarToggle}
						isHeaderOpen={isHeaderOpen}
						items={courseProgressQuery.data.items}
						name={courseProgressQuery.data.name}
						coursePermalink={courseProgressQuery.data.course_permalink}
						activeIndex={googleMeetQuery?.data?.parent_menu_order}
						meeting_id={builderQuery?.data?.contents}
						welcomeMessage={
							courseProgressQuery.data.welcome_message_to_first_time_user
						}
						isWelcomeUser={isWelcomeUser}
						onCloseModal={onCloseModal}
					/>

					<Box transition="all 0.35s" ml={isSidebarOpen ? '300px' : 0}>
						<Header
							summary={courseProgressQuery.data.summary}
							isOpen={isHeaderOpen}
							onToggle={onHeaderToggle}
							coursePermalink={courseProgressQuery.data.course_permalink}
						/>
						<Container centerContent maxW="container.lg" py="16">
							<Box
								bg={
									COLORS_BASED_ON_SCREEN_COLOR_MODE[colorMode]
										?.interactiveGoogleMeetBgColor
								}
								p={['5', null, '14']}
								shadow="box"
								w="full"
							>
								<Stack direction="column" spacing="8">
									<Heading as="h5">{googleMeetQuery?.data?.name}</Heading>

									<Stack spacing={4}>
										<Stack>
											<HStack spacing={4}>
												<HStack
													color={
														COLORS_BASED_ON_SCREEN_COLOR_MODE[colorMode]
															?.interactiveGoogleMeetTextColor
													}
													fontSize="sm"
												>
													<Text fontWeight="medium">
														{__('Time:', 'learning-management-system')}
													</Text>
													<Stack
														direction="row"
														spacing="2"
														alignItems="center"
														color={
															COLORS_BASED_ON_SCREEN_COLOR_MODE[colorMode]
																?.interactiveGoogleMeetTextColor
														}
													>
														<Icon as={BiCalendar} />
														<Text fontSize="15px">
															{getWordpressLocalTime(
																localStartTime,
																'Y-m-d, h:i A',
															)}
														</Text>
													</Stack>
												</HStack>
												{status === GoogleMeetStatus.Active ? (
													<Badge bg="green.500" color="white" fontSize="10px">
														{__('Ongoing', 'learning-management-system')}
													</Badge>
												) : null}
												{status === GoogleMeetStatus.Expired ? (
													<Badge bg="red.500" color="white" fontSize="10px">
														{__('Expired', 'learning-management-system')}
													</Badge>
												) : null}
												{status === GoogleMeetStatus.UpComing ? (
													<Badge bg="primary.500" color="white" fontSize="10px">
														{__('UpComing', 'learning-management-system')}
													</Badge>
												) : null}
											</HStack>

											{+googleMeetQuery.data?.duration ? (
												<Stack>
													<HStack
														color={
															COLORS_BASED_ON_SCREEN_COLOR_MODE[colorMode]
																?.interactiveGoogleMeetTextColor
														}
														fontSize="sm"
													>
														<Text fontWeight="medium">
															{__('Duration:', 'learning-management-system')}
														</Text>
														<Text>
															{humanizeDuration(
																(googleMeetQuery.data?.duration || 0) *
																	60 *
																	1000,
															)}
														</Text>
													</HStack>
												</Stack>
											) : null}

											<Stack>
												<HStack
													color={
														COLORS_BASED_ON_SCREEN_COLOR_MODE[colorMode]
															?.interactiveGoogleMeetTextColor
													}
													fontSize="sm"
												>
													<Text fontWeight="medium">
														{__('Meeting ID:', 'learning-management-system')}
													</Text>
													<Text>{googleMeetQuery.data?.meeting_id}</Text>
												</HStack>
											</Stack>

											{googleMeetQuery.data?.password ? (
												<Stack>
													<HStack
														color={
															COLORS_BASED_ON_SCREEN_COLOR_MODE[colorMode]
																?.interactiveGoogleMeetTextColor
														}
														fontSize="sm"
													>
														<Text fontWeight="medium">
															{__('Password:', 'learning-management-system')}
														</Text>
														<Text>{googleMeetQuery.data?.password}</Text>
													</HStack>
												</Stack>
											) : null}
										</Stack>

										{status === GoogleMeetStatus.Active ||
										status === GoogleMeetStatus.UpComing ? (
											<HStack>
												<Link
													href={googleMeetQuery?.data?.meet_url}
													target="_blank"
												>
													<Button
														colorScheme="blue"
														size="xs"
														leftIcon={<RiLiveLine />}
														fontWeight="semibold"
													>
														{__('Join Meeting', 'learning-management-system')}
													</Button>
												</Link>
											</HStack>
										) : null}
									</Stack>

									<Text
										className="masteriyo-interactive-description"
										dangerouslySetInnerHTML={{
											__html: googleMeetQuery?.data?.description,
										}}
									/>
								</Stack>

								{localStartTime && !meetingStarted ? (
									<MeetingTimer
										startAt={localStartTime}
										duration={googleMeetQuery?.data.duration}
										onTimeout={() => setMeetingStarted(true)}
									/>
								) : null}

								<FloatingNavigation
									navigation={googleMeetQuery?.data?.navigation}
									courseId={courseId}
									isSidebarOpened={isSidebarOpen}
									completed={completeQuery?.data?.completed}
								/>
							</Box>
							<ContentNav
								navigation={googleMeetQuery?.data?.navigation}
								courseId={courseId}
								onCompletePress={onCompletePress}
								isButtonLoading={completeMutation.isLoading}
								isButtonDisabled={completeQuery?.data?.completed}
							/>
						</Container>
					</Box>
				</Box>
			</>
		);
	}
	return <FullScreenLoader />;
};

export default InteractiveGoogleMeet;
